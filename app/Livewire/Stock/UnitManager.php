<?php

namespace App\Livewire\Stock;

use App\Models\Unit;
use App\Models\UnitSet;
use Livewire\Component;
use Livewire\WithPagination;

class UnitManager extends Component
{
    use WithPagination;

    public $search;

    public $code;

    public $name;

    public $unit_set_id;

    public $unit_id;

    public $unit;

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
        $this->unit = UnitSet::find($bankId);

        $this->unit_set_id = $bankId;
    }

    public function render()
    {
        return view('stock.unit-component', [
            'units' => Unit::where('unit_set_id', $this->unit_set_id)->orderByDesc('id')->paginate(10),
            'unitSets' => UnitSet::all(),
        ])->extends('components.layouts.app')->section('content');
    }

    public function resetForm()
    {
        $this->reset(['code', 'name', 'unit_id', 'isEditMode']);
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        Unit::create([
            'unit_set_id' => $this->unit_set_id,
            'code' => $this->code,
            'name' => $this->name,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = 'Birim başarıyla eklendi.';
    }

    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        $this->unit_id = $id;
        $this->code = $unit->code;
        $this->name = $unit->name;
        $this->isEditMode = true;

        $this->dispatch('modal-open');
    }

    public function update()
    {
        $this->validate();

        $unit = Unit::findOrFail($this->unit_id);
        $unit->update([
            'code' => $this->code,
            'name' => $this->name,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');

        $this->dispatch('swal', [
            'title' => 'Başarılı!',
            'text' => 'Kayıt başarıyla eklendi.',
            'icon' => 'success',
        ]);
        $this->successMessage = 'Birim başarıyla güncellendi.';
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Unit::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->successMessage = 'Birim başarıyla silindi.';
    }
}
