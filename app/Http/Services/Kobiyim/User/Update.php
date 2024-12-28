<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Http\Services\Kobiyim\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Update
{
    public function handle(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'name'     => $request->name,
                'phone'    => $request->phone,
                'type'     => $request->type,
                'password' => $request->password,
            ],
            [
                'name'     => 'required|min:3|max:128',
                'phone'    => ['required_without:phone|nullable', Rule::unique('users')->ignore($id, 'id')],
                'password' => 'nullable|min:8',
            ],
            [
                'name.required' => 'Kullanıcı adı girmelisiniz.',
                'name.min'      => 'Kullanıcı adı en az 3 karakter olmalıdır.',
                'name.max'      => 'Kullanıcı adı maksimum 128 karakter olabilir.',
                'phone.unique'  => 'Kullanıcı telefon numarası daha önce kullanılmış',
            ],
        );

        if ($validator->passes()) {
            User::find($id)->update([
                'name'  => $request->name,
                'phone' => $request->phone,
                'type'  => $request->type,
            ]);

            activityRecord([
                'subject_type' => 'App\Models\User',
                'subject_id'   => $id,
                'description'  => 'Kullanıcı güncellendi.',
            ]);

            if ($request->has('password')) {
                User::find($id)->update(['password' => Hash::make($request->password)]);
            }

            return response()->json([
                'status'  => 'success',
                'message' => 'Kullanıcı düzenlendi.',
            ]);
        }

        return response()->json([
            'status'   => 'error',
            'messages' => arrangeErrors($validator->errors()->toArray()),
        ]);
    }
}
