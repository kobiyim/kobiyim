<?php

namespace App\Livewire\Vault;

use App\Models\Card;
use App\Models\CardActivity;
use App\Models\VaultFiche;
use Livewire\Component;

class Edit extends Component
{
    public $ficheId;

    public $fiche;

    public $cards;

    public $details = [];

    public $deleted = [];

    public $newCreation = [];

    public function mount($ficheId)
    {
        $this->ficheId = $ficheId;
        $this->fiche = VaultFiche::with('details')->findOrFail($ficheId);

        $this->cards = Card::where('active', 1)->orderBy('name')->get()->pluck('name', 'id');

        $this->details = $this->fiche->details->map(function ($d) {
            return [
                'id' => $d->id,
                'vault_id' => $d->vault_id,
                'card_id' => $d->card_id,
                'amount' => $d->amount,
                'description' => $d->description,
            ];
        })->keyBy('id')->toArray();
    }

    public function render()
    {
        return view('vault.fiche.edit');
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
            'sign' => signOfSalesInvoice($this->type),
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

        return redirect('invoice/sales');
    }

    public function addDetail()
    {
        $this->newCreation[] = ['vault_id' => '', 'card_id' => '', 'amount' => 0, 'description' => ''];
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
