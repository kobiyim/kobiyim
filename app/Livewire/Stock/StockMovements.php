<?php

namespace App\Livewire\Stock;

use App\Models\InvoiceDetail;
use Livewire\Component;

class StockMovements extends Component
{
    public $search = '';

    public function render()
    {
        $keywords = collect(explode(' ', trim($this->search)))
            ->filter()
            ->values();

        $results = InvoiceDetail::with(['invoice.card', 'item', 'unit'])
            ->when($keywords->isNotEmpty(), function ($query) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $query->where(function ($q) use ($keyword) {
                        $q->whereHas('invoice.card', function ($subQ) use ($keyword) {
                            $subQ->where('name', 'like', '%'.$keyword.'%');
                        })
                            ->orWhereHas('item', function ($subQ) use ($keyword) {
                                $subQ->where('name', 'like', '%'.$keyword.'%');
                            })
                            ->orWhereHas('invoice', function ($subQ) use ($keyword) {
                                $subQ->where('type', 'like', '%'.$keyword.'%');
                            });
                    });
                    $query->orWhere('description', 'like', '%'.$keyword.'%');
                }
            })
            ->latest()
            ->paginate('10');

        return view('stock.stock-movements', compact('results'));
    }
}
