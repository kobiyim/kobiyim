<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Http\Services\Kobiyim\Permission;

use App\Models\Permission;
use Illuminate\Http\Request;

class Destroy
{
    public function handle(Request $request, $id)
    {
        $get = Permission::find($id)->delete();

        activityRecord([
            'subject_type' => 'App\Models\Permission',
            'subject_id'   => $id,
            'description'  => 'İzin silindi.',
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'İzin silindi.',
        ]);
    }
}
