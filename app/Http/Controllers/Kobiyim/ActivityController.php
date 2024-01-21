<?php

/**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.0
 */

namespace App\Http\Controllers\Kobiyim;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        return view('kobiyim.system.activities');
    }

    public function json(Request $request)
    {
        $model = ActivityLog::query();

        return DataTables::eloquent($model)
            ->editColumn('created_at', function ($model) {
                return $model->created_at->format('d.m.Y H:i');
            })
            ->editColumn('causer_id', function ($model) {
                return $model->getUser->name;
            })
            ->toJson();
    }
}
