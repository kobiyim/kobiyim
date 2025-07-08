<?php

namespace App\Livewire\Invoice\Sales;

use App\Models\Invoice;
use Livewire\Component;

class Fiches extends Component
{
    public $confirmingDelete = false;

    public $deleteId;

    public $search = '';

    public $sortField = 'id';

    public $sortDirection = 'desc';

    public function render()
    {
        $keywords = collect(explode(' ', trim($this->search)))
            ->filter()
            ->values();

        $fiches = Invoice::with(['card'])
            ->whereIn('type', [1, 3])
            ->when($keywords->isNotEmpty(), function ($query) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $query->where(function ($q) use ($keyword) {
                        $q->whereHas('card', function ($subQ) use ($keyword) {
                            $subQ->where('name', 'like', '%'.$keyword.'%');
                        });
                        $q->orWhere('docode', 'like', '%'.$keyword.'%');
                        $q->orWhere('invoice_no', 'like', '%'.$keyword.'%');
                    });
                    // $query->orWhere('docode', 'like', '%' . $keyword . '%');
                }
            })
            ->orderBy($this->sortField, $this->sortDirection)->paginate(10);

        return view('invoice.sales.list', compact('fiches'));
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        $invoice = Invoice::findOrFail($this->deleteId);

        $invoice->details()->delete();
        $invoice->delete();

        $this->confirmingDelete = false;
        $this->successMessage = 'Fatura başarıyla silindi.';
    }
}
