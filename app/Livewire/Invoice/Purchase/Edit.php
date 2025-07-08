<?php

namespace App\Livewire\Invoice\Purchase;

use App\Models\Card;
use App\Models\CardActivity;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Item;
use Livewire\Component;

class Edit extends Component
{
    public $invoiceId;

    public $invoice;

    public $card_id;

    public $invoice_no;

    public $date_;

    public $description;

    public $type;

    public $total;

    public $stocks;

    public $details = [];

    public $deleted = [];

    public $newCreation = [];

    public function mount($purchaseId)
    {
        $this->invoiceId = $purchaseId;
        $this->invoice = Invoice::with('details')->findOrFail($purchaseId);

        $this->stocks = Item::where('active', 1)->orderBy('name')->get()->pluck('name', 'id');

        $this->card_id = $this->invoice->card_id;
        $this->invoice_no = $this->invoice->invoice_no;
        $this->date_ = $this->invoice->date_->toDateString();
        $this->description = $this->invoice->description;
        $this->type = $this->invoice->type;
        $this->total = $this->invoice->total;

        $this->details = $this->invoice->details->map(function ($d) {
            return [
                'id' => $d->id,
                'stock_id' => $d->stock_id,
                'unit_id' => $d->unit_id,
                'quantity' => $d->quantity,
                'description' => $d->description,
                'price' => $d->price,
                'total' => $d->total,
            ];
        })->keyBy('id')->toArray();
    }

    public function render()
    {
        $data['cards'] = Card::where('active', 1)->orderBy('name')->get()->pluck('name', 'id');

        return view('invoice.purchase.edit', $data);
    }

    public function update()
    {
        $this->validate([
            'card_id' => 'required',
            'invoice_no' => 'required|unique:invoices,invoice_no,'.$this->invoice->id,
            'date_' => 'required|date',
            'type' => 'required',
        ]);

        $this->validate([
            'details.*.stock_id' => 'required',
            'details.*.unit_id' => 'required',
            'details.*.quantity' => 'required|numeric|min:1',
            'details.*.price' => 'required|numeric|min:0',
        ]);

        foreach ($this->details as &$detail) {
            $detail['total'] = (float) $detail['quantity'] * (float) $detail['price'];
        }

        $this->validate([
            'newCreation.*.stock_id' => 'required',
            'newCreation.*.unit_id' => 'required',
            'newCreation.*.quantity' => 'required|numeric|min:1',
            'newCreation.*.price' => 'required|numeric|min:0',
        ]);

        foreach ($this->newCreation as &$detail) {
            $detail['total'] = (float) $detail['quantity'] * (float) $detail['price'];
        }

        $this->total = array_sum(array_column($this->details, 'total')) + array_sum(array_column($this->newCreation, 'total'));

        $this->invoice->update([
            'card_id' => $this->card_id,
            'invoice_no' => $this->invoice_no,
            'date_' => $this->date_,
            'description' => $this->description,
            'sign' => signOfPurchaseInvoice($this->type),
            'total' => $this->total,
        ]);

        // Yeni detayları kaydet
        foreach ($this->deleted as $detail) {
            InvoiceDetail::find($detail)->delete();
        }

        foreach ($this->newCreation as $detail) {
            InvoiceDetail::create([
                'invoice_id' => $this->invoiceId,
                'stock_id' => $detail['stock_id'],
                'unit_id' => $detail['unit_id'],
                'quantity' => $detail['quantity'],
                'description' => $detail['description'],
                'price' => $detail['price'],
                'total' => $detail['total'],
            ]);
        }

        CardActivity::where([
            'card_id' => $this->card_id,
            'type' => 1,
            'subject_id' => $this->invoiceId,
        ])->update([
            'date_' => $this->date_,
            'total' => $this->total,
        ]);

        session()->flash('message', 'Fatura güncellendi.');

        return redirect('invoice/purchase');
    }

    public function addDetail()
    {
        $this->newCreation[] = ['stock_id' => $this->stocks->keys()->first(), 'unit_id' => '', 'quantity' => 1, 'description' => '', 'price' => 0, 'total' => 0];
    }

    public function removeFromDetail($index)
    {
        $this->deleted[] = $index;
        unset($this->details[$index]);
        $this->details = array_values($this->details); // Reindex after unset
    }

    public function removeFromCreation($index)
    {
        unset($this->newCreation[$index]);
        $this->newCreation = array_values($this->newCreation); // Reindex after unset
    }
}
