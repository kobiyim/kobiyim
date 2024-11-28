<?php

/**
 * Kobiyim
 *
 * @version v3.0.0
 *
 */

namespace App\Http\Services\Kobiyim\Activity;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Json
{
    public function handle(Request $request)
    {
        $model = ActivityLog::orderBy('created_at', 'desc');

        return DataTables::eloquent($model)
            ->editColumn('created_at', function ($model) {
                return $model->created_at->format('d.m.Y H:i');
            })
            ->editColumn('causer_id', function ($model) {
                return ($model->causer_id != null) ? $model->getUser->name : 'Tanımsız';
            })
            ->toJson();
    }
}
