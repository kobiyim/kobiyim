<?php

/**
 * Kobiyim.
 *
 * @since v1.0.18
 */

namespace App\Http\Controllers\Kobiyim;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        return view('kobiyim.system.permissions.index');
    }

    public function json(Request $request)
    {
        $model = Permission::query();

        return DataTables::eloquent($model)
            ->addColumn('islemler', 'kobiyim.system.permissions.actions')
            ->rawColumns(['islemler'])
            ->toJson();
    }

    public function store(Request $request)
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
            'messages' => $this->arrangeErrors($validator->errors()->toArray()),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'name' => $request->name,
                'key' => $request->key,
            ],
            [
                'name' => 'required|min:3|max:64',
                'key' => ['required', 'max:16', Rule::unique('App\Models\Permission', 'key')->ignore($id)],
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
            Permission::find($id)->update([
                'name' => $request->name,
                'key' => $request->key,
            ]);

            activityRecord([
                'subject_type' => 'App\Models\Permission',
                'subject_id' => $id,
                'description' => 'İzin düzenlendi.',
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'İzin düzenlendi.',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'messages' => $this->arrangeErrors($validator->errors()->toArray()),
        ]);
    }

    public function destroy(Request $request, $id)
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
