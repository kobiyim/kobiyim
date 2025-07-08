<?php

namespace App\Livewire\Bank\Fiche;

use App\Models\Bank;
use App\Models\BankFiche;
use App\Models\Card;
use App\Models\CardActivity;
use Livewire\Component;

class Create extends Component
{
    public $fiche_no;

    public $date_;

    public $description;

    public $transaction;

    public $total;

    public $details = []; // Satır detayları

    public $banks;

    public function mount()
    {
        $this->banks = Bank::where('active', 1)->orderBy('name')->get()->pluck('name', 'id')->prepend('Seçiniz', '');

        $this->resetInputFields();
    }

    public function render()
    {
        $data['cards'] = Card::where('active', 1)->orderBy('name')->get()->pluck('name', 'id')->prepend('Seçiniz', '');

        return view('bank.fiche.create', $data);
    }

    private function resetInputFields()
    {
        $this->fiche_no = '';
        $this->date_ = now()->toDateString();
        $this->description = '';
        $this->amount = 0;
        $this->details = [
            [
                'bank_id' => '', 'bank_account_id' => '', 'amount' => 0, 'description' => '',
            ],
        ];
    }

    public function addDetail()
    {
        $this->details[] = ['bank_id' => '', 'bank_account_id' => '', 'amount' => 0, 'description' => ''];
    }

    public function removeDetail($index)
    {
        unset($this->details[$index]);
    }

    public function store()
    {
        $validatedInvoice = $this->validate([
            'fiche_no' => 'required|unique:bank_fiches,fiche_no',
            'date_' => 'required|date',
            'transaction' => 'required',
        ]);

        $validatedDetails = $this->validate([
            'details.*.bank_id' => 'required',
            'details.*.bank_account_id' => 'required',
            'details.*.amount' => 'required|numeric|min:1',
        ]);

        $this->total = array_sum(array_column($this->details, 'amount'));

        $fiche = BankFiche::create([
            'date_' => $this->date_,
            'fiche_no' => $this->fiche_no,
            'transaction' => $this->transaction,
            'sign' => signOfBankFiche($this->transaction),
            'total' => $this->total,
            'description' => $this->description,
        ]);

        // Yeni detayları kaydet
        foreach ($this->details as $detail) {
            CardActivity::create([
                'card_id' => $detail['card_id'],
                'type' => 1,
                'subject_id' => $fiche->id,
                'sign' => signOfBankFiche($this->transaction),
                'date_' => $this->date_,
                'total' => $this->total,
            ]);

            $fiche->lines()->create($detail);
        }

        session()->flash('message', 'Fatura ve detaylar eklendi.');

        $this->resetInputFields();
    }
}
