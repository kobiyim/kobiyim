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

class Store
{
    public function handle(Request $request)
    {
        $validator = Validator::make(
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'password' => $request->password,
                'type' => $request->type,
            ],
            [
                'name' => 'required|min:3|max:128',
                'phone' => 'required|unique:users,phone',
                'password' => 'required|min:8',
                'type' => 'required',
            ],
            [
                'name.required' => 'Kullanıcı adı girmelisiniz.',
                'name.min' => 'Kullanıcı adı en az 3 karakter olmalıdır.',
                'name.max' => 'Kullanıcı adı maksimum 128 karakter olabilir.',
                'phone.unique' => 'Kullanıcı telefon numarası daha önce kullanılmış',
            ],
        );

        if ($validator->passes()) {
            $created = User::create([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'is_active' => 1,
                'type' => $request->type,
            ]);

            activityRecord([
                'subject_type' => 'App\Models\User',
                'subject_id' => $created->id,
                'description' => 'Kullanıcı eklendi.',
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Kullanıcı aktif olarak eklendi.',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'messages' => arrangeErrors($validator->errors()->toArray()),
        ]);
    }
}
