<?php

/**
 * Kobiyim.
 *
 * @since v1.0.23
 */

namespace App\Http\Controllers\Kobiyim;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BackupController extends Controller
{
    public function index(Request $request)
    {
        return view('kobiyim.system.backups');
    }

    public function json(Request $request)
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
