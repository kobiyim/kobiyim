<?php

namespace App\Livewire\System;

use App\Models\Backup;
use Livewire\Component;
use Livewire\WithPagination;

class BackupComponent extends Component
{
    use WithPagination;


    public function render()
    {
        $items = Backup::orderBy('created_at', 'desc')->paginate(10);

        return view('system.backup', compact('items'));
    }

}
