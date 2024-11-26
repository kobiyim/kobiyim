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

class Store
{
    public function handle(Request $request)
    {
        $validator = Validator::make(
            [
                'name' => $request->name,
                'key' => $request->key,
            ],
            [
                'name' => 'required|min:3|max:64',
                'key' => 'required|max:16|unique:App\Models\Permission,key',
            ],
            [
                'name.required' => 'İzin için ad girmelisiniz.',
                'name.min' => 'İzin adı en az 3 karakter olmalıdır.',
                'name.max' => 'İzin adı maksimum 128 karakter olabilir.',
                'key.required' => 'İzin anahtarı alanı gereklidir.',
                'key.max' => 'İzin anahtarı maksimum 16 karater olabilir.',
                'key.unique' => 'İzin anahtarı eşsiz olmaldır.',
            ],
        );

        if ($validator->passes()) {
            $created = Permission::create([
                'name' => $request->name,
                'key' => $request->key,
            ]);

            activityRecord([
                'subject_type' => 'App\Models\Permission',
                'subject_id' => $created->id,
                'description' => 'İzin eklendi.',
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'İzin eklendi.',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'messages' => arrangeErrors($validator->errors()->toArray()),
        ]);
    }
}
