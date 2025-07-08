<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class UserForm extends Component
{
    public $userId = null;
    public $name, $email, $password;
    public $roles = [];
    public $roleIds = [];

    public function mount($userId = null)
    {
        $this->roles = Role::all();

        if ($userId) {
            $user = User::findOrFail($userId);
            $this->userId = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->roleIds = $user->roles->pluck('id')->toArray();
        }
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'password' => $this->userId ? 'nullable|min:6' : 'required|min:6',
        ]);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        if ($this->password) {
            $data['password'] = bcrypt($this->password);
        }

        $user = User::updateOrCreate(['id' => $this->userId], $data);
        $user->roles()->sync($this->roleIds);

        $this->dispatchBrowserEvent('closeModal'); // frontend modal'ı kapat
        $this->emitUp('userSaved'); // parent bileşeni uyar
    }

    public function render()
    {
        return view('livewire.user-form');
    }
}
