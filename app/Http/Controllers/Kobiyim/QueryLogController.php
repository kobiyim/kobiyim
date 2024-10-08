<?php

/**
 * Kobiyim
 *
 * @version v2.0.0
 */

namespace App\Http\Controllers\Kobiyim;

use App\Models\QueryLog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class QueryLogController extends Controller
{
    public function index(Request $request)
    {
        return view('kobiyim.system.querylogs.index');
    }

    public function json(Request $request)
    {
        $model = QueryLog::orderBy('created_at', 'desc');

        return DataTables::eloquent($model)
            ->editColumn('created_at', function ($model) {
                return $model->created_at->format('d.m.Y H:i');
            })
            ->addColumn('islemler', 'kobiyim.system.querylogs.actions')
            ->editColumn('causer_id', function ($model) {
                return ($model->causer_id != null) ? $model->getUser->name : 'Tanımsız';
            })
            ->rawColumns(['islemler'])
            ->toJson();
    }
}
