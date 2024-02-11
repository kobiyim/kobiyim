<?php

/**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.18
 */

namespace App\Http\Controllers\Kobiyim;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
                'key'  => $request->key,
            ],
            [
                'name' => 'required|min:3|max:64',
                'key'  => 'required|max:16',
            ],
            [
                'name.required' => 'Stok adı girmelisiniz.',
                'name.min'      => 'Stok adı en az 3 karakter olmalıdır.',
                'name.max'      => 'Stok adı maksimum 128 karakter olabilir.',
            ]
        );

        if ($validator->passes()) {
            $created = Permission::create([
                'name' => $request->name,
                'key'  => $request->key,
            ]);

            activityRecord([
                'subject_type' => 'App\Models\Permission',
                'subject_id'   => $created->id,
                'description'  => 'İzin eklendi.',
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'İzin eklendi.',
            ]);
        }

        return response()->json([
            'status'   => 'error',
            'messages' => $this->arrangeErrors($validator->errors()->toArray()),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'name' => $request->name,
                'key'  => $request->key,
            ],
            [
                'name' => 'required|min:3|max:64',
                'key'  => 'required|size:16',
            ],
            [
                'name.required' => 'Stok adı girmelisiniz.',
                'name.min'      => 'Stok adı en az 3 karakter olmalıdır.',
                'name.max'      => 'Stok adı maksimum 128 karakter olabilir.',
            ]
        );

        if ($validator->passes()) {
            Permission::find($id)->update([
                'name'  => $request->name,
                'key' => $request->key,
            ]);

            activityRecord([
                'subject_type' => 'App\Models\Permission',
                'subject_id'   => $id,
                'description'  => 'İzin düzenlendi.',
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'İzin düzenlendi.',
            ]);
        }

        return response()->json([
            'status'   => 'error',
            'messages' => $this->arrangeErrors($validator->errors()->toArray()),
        ]);
    }

    public function destroy(Request $request, $id)
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
