<?php

namespace App\Livewire\Bank\Fiche;

use App\Models\Bank;
use App\Models\BankFiche;
use App\Models\BankFicheLine;
use App\Models\Card;
use App\Models\CardActivity;
use Livewire\Component;

class Edit extends Component
{
    public $bankFicheId;

    public $bankFiche;

    public $fiche_no;

    public $date_;

    public $description;

    public $type;

    public $total;

    public $details = [];

    public $deleted = [];

    public $newCreation = [];

    public function mount($bankFicheId)
    {
        $this->bankFicheId = $bankFicheId;
        $this->bankFiche = BankFiche::findOrFail($bankFicheId);

        $this->fiche_no = $this->bankFiche->fiche_no;
        $this->date_ = $this->bankFiche->date_;
        $this->description = $this->bankFiche->description;
        $this->type = $this->bankFiche->type;
        $this->total = $this->bankFiche->total;

        $this->details = $this->bankFiche->lines->map(function ($d) {
            return [
                'id' => $d->id,
                'bank_id' => $d->bank_id,
                'bank_account_id' => $d->bank_account_id,
                'card_id' => $d->card_id,
                'amount' => $d->amount,
                'description' => $d->description,
            ];
        })->keyBy('id')->toArray();
    }

    public function render()
    {
        $data['cards'] = Card::where('active', 1)->orderBy('name')->get()->pluck('name', 'id');
        $data['banks'] = Bank::orderBy('name')->get()->pluck('name', 'id');

        return view('bank.fiche.edit', $data);
    }

    public function update()
    {
        $this->validate([
            'fiche_no' => 'required|unique:bank_fiches,fiche_no',
            'date_' => 'required|date',
            'transaction' => 'required',
        ]);

        $this->validate([
            'details.*.bank_id' => 'required',
            'details.*.bank_account_id' => 'required',
            'details.*.amount' => 'required|numeric|min:1',
        ]);

        $this->validate([
            'details.*.bank_id' => 'required',
            'details.*.bank_account_id' => 'required',
            'details.*.amount' => 'required|numeric|min:1',
        ]);

        $this->total = array_sum(array_column($this->details, 'amount')) + array_sum(array_column($this->newCreation, 'amount'));

        $this->invoice->update([
            'fiche_no' => $this->fiche_no,
            'date_' => $this->date_,
            'total' => $this->total,
        ]);

        // Yeni detayları kaydet
        foreach ($this->deleted as $detail) {
            BankFicheLine::find($detail)->delete();
        }

        foreach ($this->newCreation as $detail) {
            BankFicheLine::create([
                'bank_fiche_id' => $this->bankFicheId,
                'bank_id' => $detail['bank_id'],
                'bank_account_id' => $detail['bank_account_id'],
                'card_id' => $detail['card_id'],
                'description' => $detail['description'],
                'amount' => $detail['amount'],
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
        $this->newCreation[] = ['bank_id' => '', 'bank_account_id' => '', 'amount' => 0, 'description' => ''];
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
