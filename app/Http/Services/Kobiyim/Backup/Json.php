<?php

/**
 * Kobiyim
 *
 * @version v2.0.0
 */

namespace App\Http\Services\Kobiyim\Backup;

use App\Models\Backup;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Json
{
    public function handle(Request $request)
    {
        $model = Backup::orderBy('created_at', 'desc');

        return DataTables::eloquent($model)
            ->editColumn('created_at', function ($model) {
                return $model->created_at->format('d.m.Y H:i');
            })
            ->editColumn('size', function ($model) {
                return number_format($model->size/1024/1024, 2, ',', '.');
            })
            ->editColumn('is_loaded', function($model) {
                return ($model->is_loaded == 1) ? 'Aktarıldı' : 'Yüklenmedi';
            })
            ->toJson();
    }
}
