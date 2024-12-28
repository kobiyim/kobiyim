<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Http\Services\Kobiyim\Permission;

use App\Models\Permission;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Json
{
    public function handle(Request $request)
    {
        $model = Permission::query();

        return DataTables::eloquent($model)
            ->addColumn('islemler', 'kobiyim.system.permissions.actions')
            ->rawColumns(['islemler'])
            ->toJson();
    }
}
