<?php

namespace App\Livewire\Bank;

use App\Models\BankFicheLine;
use Livewire\Component;

class Movements extends Component
{
    public function render()
    {
        return view('bank.movements', [
            'bankFicheLines' => BankFicheLine::paginate(10),
        ]);
    }
}
