<?php

namespace App\Livewire\System;

use App\Models\QueryLog;
use Livewire\Component;
use Livewire\WithPagination;

class QueryLogComponent extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $keywords = collect(explode(' ', trim($this->search)))
            ->filter()
            ->values();

        $items = QueryLog::with('user')
                            ->when($keywords->isNotEmpty(), function ($query) use ($keywords) {
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

        return view('system.query-log', compact('items'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

}
