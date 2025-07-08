<?php

namespace App\Livewire\Vault;

use App\Models\Vault;
use Livewire\Component;
use Livewire\WithPagination;

class VaultManager extends Component
{
    use WithPagination;

    public $code;

    public $name;

    public $vault_id;

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
        return view('vault.manager', [
            'vaults' => Vault::where('name', 'LIKE', '%'.$this->search.'%')->orderByDesc('id')->paginate(10),
        ])->extends('components.layouts.app')->section('content');
    }

    public function resetForm()
    {
        $this->reset(['code', 'name', 'vault_id', 'isEditMode']);
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        Vault::create([
            'code' => $this->code,
            'name' => $this->name,
            'active' => 1,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = 'Kasa başarıyla eklendi.';
    }

    public function edit($id)
    {
        $card = Vault::findOrFail($id);
        $this->vault_id = $id;
        $this->code = $card->code;
        $this->name = $card->name;
        $this->isEditMode = true;

        $this->dispatch('modal-open');
    }

    public function update()
    {
        $this->validate();

        $card = Vault::findOrFail($this->card_id);
        $card->update([
            'code' => $this->code,
            'name' => $this->name,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = 'Kasa başarıyla güncellendi.';
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Vault::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->successMessage = 'Kasa başarıyla silindi.';
    }
}
