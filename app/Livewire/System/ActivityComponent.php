<?php

namespace App\Livewire\System;

use App\Models\ActivityLog;
use Livewire\Component;
use Livewire\WithPagination;

class ActivityComponent extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $keywords = collect(explode(' ', trim($this->search)))
            ->filter()
            ->values();

        $items = ActivityLog::with('user')
                            ->when($keywords->isNotEmpty(), function ($query) use ($keywords) {
                                foreach ($keywords as $keyword) {
                                    $query->where(function ($q) use ($keyword) {
                                        $q->whereHas('user', function ($subQ) use ($keyword) {
                                            $subQ->where('name', 'like', '%'.$keyword.'%');
                                        });
                                        $q->orWhere('description', 'like', '%'.$keyword.'%');
                                    });
                                }
                            })
                            ->orderBy('created_at', 'desc')->paginate(10);

        return view('system.activity-log', compact('items'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

}
