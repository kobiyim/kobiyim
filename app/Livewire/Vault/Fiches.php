<?php

namespace App\Livewire\Vault;

use App\Models\VaultFiche;
use Livewire\Component;

class Fiches extends Component
{
    public $confirmingDelete = false;

    public $deleteId;

    public function render()
    {
        return view('vault.fiches', [
            'vaultFiches' => VaultFiche::paginate(10),
        ]);
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        VaultFiche::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->successMessage = 'Cari hesap başarıyla silindi.';
    }
}
