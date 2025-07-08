<?php

namespace App\Livewire\Invoice\Sales;

use App\Models\Invoice;
use Livewire\Component;

class Show extends Component
{
    public $invoice;

    public function mount($salesId)
    {
        $this->invoice = Invoice::find($salesId);
    }

    public function render()
    {
        return view('invoice.sales.show');
    }
}
