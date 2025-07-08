<?php

namespace App\Livewire\Invoice\Purchase;

use App\Models\Invoice;
use Livewire\Component;

class Show extends Component
{
    public $invoice;

    public function mount($purchaseId)
    {
        $this->invoice = Invoice::find($purchaseId);
    }

    public function render()
    {
        return view('invoice.purchase.show');
    }
}
