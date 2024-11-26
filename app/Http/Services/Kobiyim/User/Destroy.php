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

class Destroy
{
    public function handle(Request $request, $id)
    {
        $get = User::find($id);

        $get->update([
            'is_active' => ($get['is_active'] == 1) ? 0 : 1,
        ]);

        activityRecord([
            'subject_type' => 'App\Models\User',
            'subject_id' => $id,
            'description' => 'Kullanıcı durumu değiştirildi.',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Kullanıcı aktifliği ' . (($get['is_active'] == 1) ? 'aktif' : 'pasif') . ' olarak değiştirildi.',
        ]);
    }
}
