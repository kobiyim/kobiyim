<?php

namespace App\Livewire\Card;

use App\Models\Card;
use Livewire\Component;
use Livewire\WithPagination;

class CardManager extends Component
{
    use WithPagination;

    public $search;

    public $code;

    public $name;

    public $card_id;

    public $active = 2;

    public $isEditMode = false;

    public $confirmingDelete = false;

    public $deleteId;

    public $successMessage;

    public $showDetail = false;

    protected $rules = [
        'code' => 'required|max:13',
        'name' => 'required|max:2056',
    ];

    public $sortField = 'name';

    public $sortDirection = 'asc';

    public function render()
    {

        $keywords = collect(explode(' ', trim($this->search)))
            ->filter()
            ->values();

        $cards = Card::when($keywords->isNotEmpty(), function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->orWhere('code', 'like', '%'.$keyword.'%');
                    $q->orWhere('name', 'like', '%'.$keyword.'%');
                });
            }
        });

        if ($this->active != '2') {
            $cards->where('active', $this->active);
        }

        return view('card.manager', [
            'cards' => $cards->orderBy($this->sortField, $this->sortDirection)->paginate(10),
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
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

    public function resetForm()
    {
        $this->reset(['code', 'name', 'card_id', 'isEditMode']);
        $this->resetValidation();
    }

    public function changeDetail()
    {
        $this->showDetail = ($this->showDetail == true) ? false : true;
    }

    public function store()
    {
        $this->validate();

        Card::create([
            'code' => $this->code,
            'name' => $this->name,
            'active' => 1
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = 'Cari hesap başarıyla eklendi.';
    }

    public function edit($id)
    {
        $card = Card::findOrFail($id);
        $this->card_id = $id;
        $this->code = $card->code;
        $this->name = $card->name;
        $this->isEditMode = true;

        $this->dispatch('modal-open');
    }

    public function update()
    {
        $this->validate();

        $card = Card::findOrFail($this->card_id);
        $card->update([
            'code' => $this->code,
            'name' => $this->name,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = 'Cari hesap başarıyla güncellendi.';
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        $card = Card::find($this->deleteId);

        Card::find($this->deleteId)->update([
            'active' => ($card->active == 1) ? 0 : 1,
        ]);

        $this->confirmingDelete = false;
        $this->successMessage = 'Cari hesap durumu değiştirildi.';
    }
}
