<?php

namespace App\Livewire\Bank;

use App\Models\Bank;
use Livewire\Component;
use Livewire\WithPagination;

class BankManager extends Component
{
    use WithPagination;

    public $code;

    public $name;

    public $bank_id;

    public $is_active;

    public $search;

    public $isEditMode = false;

    public $confirmingDelete = false;

    public $deleteId;

    public $successMessage;

    protected $rules = [
        'code' => 'required|max:8',
        'name' => 'required|max:2056',
    ];

    public function render()
    {
        return view('bank.manager', [
            'banks' => Bank::where('name', 'LIKE', '%'.$this->search.'%')->orderByDesc('id')->paginate(10),
        ])->extends('components.layouts.app')->section('content');
    }

    public function resetForm()
    {
        $this->reset(['code', 'name', 'bank_id', 'isEditMode']);
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        Bank::create([
            'code' => $this->code,
            'name' => $this->name,
            'is_active' => 1,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = 'Banka başarıyla eklendi.';
    }

    public function edit($id)
    {
        $card = Bank::findOrFail($id);
        $this->bank_id = $id;
        $this->code = $card->code;
        $this->name = $card->name;
        $this->isEditMode = true;

        $this->dispatch('modal-open');
    }

    public function update()
    {
        $this->validate();

        $card = Bank::findOrFail($this->card_id);
        $card->update([
            'code' => $this->code,
            'name' => $this->name,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = 'Banka başarıyla güncellendi.';
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Bank::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->successMessage = 'Banka başarıyla silindi.';
    }
}
