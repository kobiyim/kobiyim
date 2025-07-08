<?php

namespace App\Livewire\CashItem;

use App\Models\Card;
use Livewire\Component;
use Livewire\WithPagination;

class CashItemManager extends Component
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

    protected $rules = [
        'code' => 'required|max:13',
        'name' => 'required|max:2056',
    ];

    public function render()
    {
        $cards = Card::where('name', 'LIKE', '%'.$this->search.'%');

        if ($this->active != '2') {
            $cards->where('active', $this->active);
        }

        return view('card.manager', [
            'cards' => $cards->orderByDesc('id')->paginate(10),
        ])->extends('components.layouts.app')->section('content');
    }

    public function resetForm()
    {
        $this->reset(['code', 'name', 'card_id', 'isEditMode']);
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        Card::create([
            'code' => $this->code,
            'name' => $this->name,
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
        Card::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->successMessage = 'Cari hesap başarıyla silindi.';
    }
}
