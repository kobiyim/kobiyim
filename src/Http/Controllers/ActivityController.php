<?php

namespace Kobiyim\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        return view('kobiyim::activity.index');
    }

    public function json(Request $request)
    {
        $model = Activity::query();

        return DataTables::eloquent($model)
            ->editColumn('created_at', function ($model) {
                return $model->created_at->format('d.m.Y H:i');
            })
            ->editColumn('user_id', function ($model) {
                return $model->getUser->name;
            })
            ->toJson();
    }
}
