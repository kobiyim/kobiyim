<?php

namespace App\Livewire\System\Role;

use Livewire\Component;
use App\Models\Role;

class CreateModal extends Component
{
    public $name, $key;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'key' => 'required|unique:roles,key',
        ]);

        $data = [
            'name' => $this->name,
            'key' => $this->key,
        ];

        Role::create($data);

        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('system.role.create-modal');
    }
}
