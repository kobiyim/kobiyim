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

class Update
{
    public function handle(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'type' => $request->type,
            ],
            [
                'name' => 'required|min:3|max:128',
                'phone' => 'required_without:email|nullable',
            ],
            [
                'name.required' => 'Stok adı girmelisiniz.',
                'name.min' => 'Stok adı en az 3 karakter olmalıdır.',
                'name.max' => 'Stok adı maksimum 128 karakter olabilir.',
            ],
        );

        if ($validator->passes()) {
            User::find($id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'type' => $request->type,
            ]);

            activityRecord([
                'subject_type' => 'App\Models\User',
                'subject_id' => $id,
                'description' => 'Kullanıcı güncellendi.',
            ]);

            if ($request->has('password')) {
                User::find($id)->update(['password' => Hash::make($request->password)]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Kullanıcı düzenlendi.',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'messages' => arrangeErrors($validator->errors()->toArray()),
        ]);
    }
}
