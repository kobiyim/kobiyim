<?php

/**
 * Kobiyim
 *
 * @version v3.0.0
 *
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

class SavePermission
{
    public function handle(Request $request, $id)
    {
        UserPermission::where('user_id', $id)->delete();

        foreach ($request->all() as $key => $value) {
            if (Str::contains($key, 'perm') and $value == '1') {
                UserPermission::create([
                    'user_id' => $id,
                    'permission_id' => str_replace('perm', '', $key),
                ]);
            }
        }

        activityRecord([
            'subject_type' => 'App\Models\Production',
            'subject_id' => $id,
            'description' => 'Kullanıcı izinleri güncellendi.',
        ]);

        return redirect()->route('user.index');
    }
}
