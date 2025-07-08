<?php

namespace App\Livewire\System\Permission;

use Livewire\Component;
use App\Models\Permission;

class CreateModal extends Component
{
    public $name, $key;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'key' => 'required|unique:permissions,key',
        ]);

        $data = [
            'name' => $this->name,
            'key' => $this->key,
        ];

        Permission::create($data);

        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('system.role.create-modal');
    }
}
