<?php

namespace App\Livewire\System\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $editingUserId = null;
    public $name, $phone, $roleIds = [];
    public $isCreating = false;
    public $newName, $newEmail, $newPassword;


    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->validate([
            'newName' => 'required|string|max:255',
            'newEmail' => 'required|email|unique:users,email',
            'newPassword' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $this->newName,
            'email' => $this->newEmail,
            'password' => bcrypt($this->newPassword),
        ]);

        $this->reset(['newName', 'newEmail', 'newPassword', 'isCreating']);
        session()->flash('message', 'Yeni kullanıcı başarıyla eklendi.');
    }


    public function edit($userId)
    {
        $user = User::findOrFail($userId);
        $this->editingUserId = $user->id;
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->roleIds = $user->roles->pluck('id')->toArray();
    }

    public function save()
    {
        $user = User::findOrFail($this->editingUserId);
        $user->update([
            'name' => $this->name,
            'phone' => $this->phone,
        ]);
        $user->roles()->sync($this->roleIds);

        session()->flash('message', 'Kullanıcı başarıyla güncellendi.');
        $this->reset(['editingUserId', 'name', 'phone', 'roleIds']);
    }

    public function delete($userId)
    {
        $user = User::findOrFail($userId);
        $user->roles()->detach();
        $user->delete();
        session()->flash('message', 'Kullanıcı silindi.');
    }

    public function render()
    {
        return view('system.user', [
            'users' => User::where('name', 'like', "%{$this->search}%")
                          ->orWhere('phone', 'like', "%{$this->search}%")
                          ->with('roles')
                          ->paginate(10),
            'roles' => Role::all()
        ]);
    }
}
