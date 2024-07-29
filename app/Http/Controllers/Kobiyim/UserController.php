<?php

/**
 * Kobiyim.
 *
 * @since v1.0.18
 */

namespace App\Http\Controllers\Kobiyim;

use App\Models\Permission;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('kobiyim.system.users.index');
    }

    public function json(Request $request)
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

    public function store(Request $request)
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
                'name.required' => 'Stok adı girmelisiniz.',
                'name.min' => 'Stok adı en az 3 karakter olmalıdır.',
                'name.max' => 'Stok adı maksimum 128 karakter olabilir.',
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
            'messages' => $this->arrangeErrors($validator->errors()->toArray()),
        ]);
    }

    public function update(Request $request, $id)
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
            'messages' => $this->arrangeErrors($validator->errors()->toArray()),
        ]);
    }

    public function destroy(Request $request, $id)
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

    public function permission(Request $request, $id)
    {
        $data = [
            'all' => Permission::all(),
            'user' => UserPermission::where('user_id', $id)->get()->groupBy('permission_id')->toArray(),
            'get' => User::find($id),
        ];

        return view('kobiyim.system.users.permission', $data);
    }

    public function savePermission(Request $request, $id)
    {
        UserPermission::where('user_id', $id)->delete();

        foreach ($request->all() as $key => $value) {
            if (Str::contains($key, 'perm') and $value == true) {
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
