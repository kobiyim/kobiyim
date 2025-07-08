<?php

namespace App\Livewire\Invoice\Sales;

use App\Models\Card;
use App\Models\CardActivity;
use App\Models\Invoice;
use App\Models\Item;
use Livewire\Component;

class Create extends Component
{
    public $card_id;

    public $invoice_no;

    public $date_;

    public $description;

    public $docode;

    public $type;

    public $total;

    public $stocks;

    public $details = []; // Satır detayları

    public function mount()
    {
        $this->stocks = Item::where('active', 1)->orderBy('name')->get()->pluck('name', 'id')->prepend('Seçiniz', '');

        $this->resetInputFields();
    }

    public function render()
    {
        $data['cards'] = Card::where('active', 1)->orderBy('name')->get()->pluck('name', 'id')->prepend('Seçiniz', '');

        return view('invoice.sales.create', $data);
    }

    private function resetInputFields()
    {
        $this->card_id = '';
        $this->invoice_no = '';
        $this->date_ = now()->toDateString();
        $this->description = '';
        $this->type = '';
        $this->total = 0;
        $this->details = [
            [
                'stock_id' => $this->stocks->keys()->first(), 'unit_id' => '', 'quantity' => 1, 'description' => '', 'price' => 0, 'total' => 0,
            ],
        ];
    }

    public function addDetail()
    {
        $this->details[] = ['stock_id' => $this->stocks->keys()->first(), 'unit_id' => '', 'quantity' => 1, 'description' => '', 'price' => 0, 'total' => 0];
    }

    public function removeDetail($index)
    {
        unset($this->details[$index]);
    }

    public function store()
    {
        $validatedInvoice = $this->validate([
            'card_id' => 'required',
            'invoice_no' => 'required|unique:invoices,invoice_no',
            'docode' => 'nullable',
            'date_' => 'required|date',
            'type' => 'required',
            'total' => 'required|numeric',
        ]);

        $validatedDetails = $this->validate([
            'details.*.stock_id' => 'required',
            'details.*.unit_id' => 'required',
            'details.*.quantity' => 'required|numeric|min:1',
            'details.*.price' => 'required|numeric|min:0',
        ]);

        foreach ($this->details as &$detail) {
            $detail['total'] = (float) $detail['quantity'] * (float) $detail['price'];
        }

        $this->total = array_sum(array_column($this->details, 'total'));

        $invoice = Invoice::create([
            'card_id' => $this->card_id,
            'invoice_no' => $this->invoice_no,
            'date_' => $this->date_,
            'description' => $this->description,
            'type' => $this->type,
            'sign' => signOfSalesInvoice($this->type),
            'total' => $this->total,
            'docode' => $this->docode,
        ]);

        CardActivity::create([
            'card_id' => $this->card_id,
            'type' => 1,
            'subject_id' => $invoice->id,
            'sign' => signOfSalesInvoice($this->type),
            'date_' => $this->date_,
            'total' => $this->total,
        ]);

        // Yeni detayları kaydet
        foreach ($this->details as $detail) {
            $invoice->details()->create($detail);
        }

        session()->flash('message', 'Fatura ve detaylar eklendi.');

        $this->resetInputFields();
    }
}
