<?php

namespace App\Livewire\CashItem;

use App\Models\Payroll;
use Livewire\Component;
use Livewire\WithPagination;

class PayrollManager extends Component
{
    use WithPagination;

    public function render()
    {
        return view('cash-item.payrolls', [
            'payrolls' => Payroll::paginate(10),
        ]);
    }
}
