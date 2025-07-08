<?php

namespace App\Livewire\Bank;

use App\Models\Bank;
use App\Models\BankFiche;
use App\Models\Card;
use App\Models\CardActivity;
use Livewire\Component;

class Create extends Component
{
    public $date_;

    public $fiche_no;

    public $transaction;

    public $sign = '+';

    public $total;

    public $description;

    public $cards;

    public $lines = [];

    protected $rules = [
        'date_' => 'required|date',
        'fiche_no' => 'required|string|unique:bank_fiches,fiche_no',
        'transaction' => 'required|string',
        'sign' => 'required|in:+,-',
        'description' => 'nullable|string',
        'lines.*.bank_account_id' => 'required|integer',
        'lines.*.card_id' => 'nullable|integer',
        'lines.*.description' => 'nullable|string',
        'lines.*.amount' => 'required|numeric|min:0',
    ];

    public function mount()
    {
        $this->banks = Bank::where('active', 1)->orderBy('name')->get()->pluck('name', 'id');
        $this->cards = Card::where('active', 1)->orderBy('name')->get()->pluck('name', 'id');

        $this->addLine(); // sayfa açıldığında bir satır gözüksün
    }

    public function addLine()
    {
        $this->lines[] = [
            'bank_id' => '',
            'bank_account_id' => '',
            'card_id' => '',
            'description' => '',
            'amount' => '',
        ];
    }

    public function removeLine($index)
    {
        unset($this->lines[$index]);
        $this->lines = array_values($this->lines); // indexleri düzelt
    }

    public function store()
    {
        $validated = $this->validate();

        $this->total = array_sum(array_column($this->lines, 'amount'));

        $fiche = BankFiche::create([
            'date_' => $this->date_,
            'fiche_no' => $this->fiche_no,
            'transaction' => $this->transaction,
            'sign' => signOfBankTransaction($this->transaction),
            'total' => $this->total,
            'description' => $this->description,
        ]);

        foreach ($this->lines as $line) {
            $each = $fiche->lines()->create($line);

            CardActivity::create([
                'card_id' => $line['card_id'],
                'type' => 3,
                'subject_id' => $fiche->id,
                'sign' => signOfBankTransaction($this->transaction),
                'date_' => $this->date_,
                'total' => $line['amount'],
            ]);
        }

        session()->flash('success', 'Banka fişi ve satırları başarıyla oluşturuldu.');

        return redirect('bank/fiches');
    }

    public function render()
    {
        return view('bank.create');
    }
}
