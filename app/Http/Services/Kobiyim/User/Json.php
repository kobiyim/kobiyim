<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Http\Services\Kobiyim\User;

use App\Models\User;
use Illuminate\Http\Request;
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
            ->editColumn('type', function ($model) {
                return ($model->type == 'user') ? 'Kullanıcı' : 'Yönetici';
            })
            ->rawColumns(['islemler'])
            ->toJson();
    }
}
