<?php

namespace App\Livewire\Bank\Fiche;

use App\Models\BankFiche;
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

        $bankFiches = BankFiche::when($keywords->isNotEmpty(), function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->orWhere('description', 'like', '%'.$keyword.'%');
                    $q->orWhere('fiche_no', 'like', '%'.$keyword.'%');
                });
                // $query->orWhere('docode', 'like', '%' . $keyword . '%');
            }
        })
            ->orderBy($this->sortField, $this->sortDirection)->paginate(10);

        return view('bank.fiches', compact('bankFiches'));
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
        $invoice = BankFiche::findOrFail($this->deleteId);

        $invoice->lines()->delete();
        $invoice->delete();

        $this->confirmingDelete = false;
        $this->successMessage = 'Fatura başarıyla silindi.';
    }
}
