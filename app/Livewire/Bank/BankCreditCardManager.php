<?php

namespace App\Livewire\Bank;

use App\Models\BankAccount;
use Livewire\Component;
use Livewire\WithPagination;

class BankCreditCardManager extends Component
{
    use WithPagination;

    public $search;

    public $code;

    public $name;

    public $bank_id;

    public $bank_account_id;

    public $isEditMode = false;

    public $confirmingDelete = false;

    public $deleteId;

    public $successMessage;

    protected $rules = [
        'code' => 'required|max:8',
        'name' => 'required|max:2056',
    ];

    public function mount($bankId)
    {
        $this->bank_id = $bankId;
    }

    public function render()
    {
        return view('bank-accounts', [
            'bankAccounts' => BankAccount::where('bank_id', $this->bank_id)->where('name', 'LIKE', '%'.$this->search.'%')->orderByDesc('id')->paginate(10),
        ])->extends('components.layouts.app')->section('content');
    }

    public function resetForm()
    {
        $this->reset(['code', 'name', 'isEditMode']);
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        BankAccount::create([
            'bank_id' => $this->bank_id,
            'code' => $this->code,
            'name' => $this->name,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = 'Banka hesabı başarıyla eklendi.';
    }

    public function edit($id)
    {
        $card = BankAccount::findOrFail($id);
        $this->bank_account_id = $id;
        $this->code = $card->code;
        $this->name = $card->name;
        $this->isEditMode = true;

        $this->dispatch('modal-open');
    }

    public function update()
    {
        $this->validate();

        $card = BankAccount::findOrFail($this->bank_account_id);
        $card->update([
            'code' => $this->code,
            'name' => $this->name,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = 'Banka hesabı başarıyla güncellendi.';
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        BankAccount::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->successMessage = 'Banka hesabı başarıyla silindi.';
    }
}
