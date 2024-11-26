<?php

/**
 * Kobiyim
 *
 * @version v2.0.0
 */

namespace App\Http\Services\Kobiyim\Permission;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class Destroy
{
    public function handle(Request $request, $id)
    {
        $get = Permission::find($id)->delete();

        activityRecord([
            'subject_type' => 'App\Models\Permission',
            'subject_id' => $id,
            'description' => 'İzin silindi.',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'İzin silindi.',
        ]);
    }
}
