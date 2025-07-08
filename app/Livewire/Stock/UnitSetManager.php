<?php

namespace App\Livewire\Stock;

use App\Models\UnitSet;
use Livewire\Component;
use Livewire\WithPagination;

class UnitSetManager extends Component
{
    use WithPagination;

    public $code;

    public $name;

    public $unit_set_id;

    public $is_active;

    public $search;

    public $isEditMode = false;

    public $confirmingDelete = false;

    public $deleteId;

    public $successMessage;

    protected $rules = [
        'code' => 'required|max:8',
        'name' => 'required|max:512',
    ];

    public function render()
    {
        return view('stock.unit-set-component', [
            'unitSets' => UnitSet::where('name', 'LIKE', '%'.$this->search.'%')->orderByDesc('id')->paginate(10),
        ])->extends('components.layouts.app')->section('content');
    }

    public function resetForm()
    {
        $this->reset(['code', 'name', 'unit_set_id', 'isEditMode']);
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        UnitSet::create([
            'code' => $this->code,
            'name' => $this->name,
            'active' => 1,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = 'Birim seti başarıyla eklendi.';
    }

    public function edit($id)
    {
        $unitSet = UnitSet::findOrFail($id);
        $this->unit_set_id = $id;
        $this->code = $unitSet->code;
        $this->name = $unitSet->name;
        $this->isEditMode = true;

        $this->dispatch('modal-open');
    }

    public function update()
    {
        $this->validate();

        $unitSet = UnitSet::findOrFail($this->unit_set_id);
        $unitSet->update([
            'code' => $this->code,
            'name' => $this->name,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = 'Birim seti başarıyla güncellendi.';
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        $unitSet = UnitSet::find($this->deleteId);

        UnitSet::find($this->deleteId)->update([
            'active' => ($unitSet->active == 1) ? 0 : 1,
        ]);

        $this->confirmingDelete = false;
        $this->successMessage = 'Birim seti durumu başarıyla değiştirildi.';
    }
}
