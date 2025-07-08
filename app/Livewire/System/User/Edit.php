<?php

namespace App\Livewire\System\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class Edit extends Component
{
    public $userId;
    public $name;
    public $phone;
    public $password;
    public $roles = [];
    public $selectedRoles = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'required',
        'password' => 'nullable|min:6',
    ];

    public function mount($userId = null)
    {
        $this->roles = Role::all();

        if ($userId) {
            $user = User::with('roles')->findOrFail($userId);
            $this->userId = $user->id;
            $this->name = $user->name;
            $this->phone = $user->phone;
            $this->selectedRoles = $user->roles->pluck('id')->toArray();
        }
    }

    public function save()
    {
        $this->validate($this->rules);

        $data = [
            'name' => $this->name,
            'phone' => $this->phone,
        ];

        if ($this->password) {
            $data['password'] = bcrypt($this->password);
        }

        $user = User::updateOrCreate(
            ['id' => $this->userId],
            $data
        );

        $user->roles()->sync($this->selectedRoles);

        $this->dispatchBrowserEvent('closeModal');
    }

    public function render()
    {
        return view('system.user.edit-modal');
    }
}
