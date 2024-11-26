<?php

/**
 * Kobiyim
 *
 * @version v2.0.0
 */

namespace App\Http\Services\Kobiyim\User;

use App\Models\Permission;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class Json
{
    public function handle(Request $request)
    {
        $model = User::query();

        return DataTables::eloquent($model)
            ->addColumn('islemler', 'kobiyim.system.users.actions')
            ->setRowAttr([
                'style' => function ($model) {
                    return ($model->is_active == '0') ? 'background-color: rgb(255,0,0,0.1);' : 'background-color: rgb(0,255,0,0.1);';
                },
            ])
            ->rawColumns(['islemler'])
            ->toJson();
    }
}
