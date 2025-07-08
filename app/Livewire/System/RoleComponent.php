<?php

namespace App\Livewire\System;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RoleComponent extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $keywords = collect(explode(' ', trim($this->search)))
            ->filter()
            ->values();

        $items = Role::when($keywords->isNotEmpty(), function ($query) use ($keywords) {
                                foreach ($keywords as $keyword) {
                                    $query->where(function ($q) use ($keyword) {
                                        $q->whereHas('user', function ($subQ) use ($keyword) {
                                            $subQ->where('name', 'like', '%'.$keyword.'%');
                                        });
                                        $q->orWhere('type', 'like', '%'.$keyword.'%');
                                        $q->orWhere('subject_type', 'like', '%'.$keyword.'%');
                                        $q->orWhere('subject_detail', 'like', '%'.$keyword.'%');
                                        $q->orWhere('subject_id', 'like', '%'.$keyword.'%');
                                    });
                                }
                            })
                            ->orderBy('created_at', 'desc')->paginate(10);

        return view('system.role', compact('items'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

}
