<?php

/**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.0
 */

namespace App\Http\Controllers\Kobiyim;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Permission;
use App\Models\User;

class KobiyimModalsController extends Controller
{
    public function __invoke(Request $request)
    {
        // bu derleyici içine erişebilmek için key olmak zorunda
        if ($request->has('key') and method_exists($this, $request->key)) {
            return $this->{$request->key}($request);
        }

        return throw new \Exception('Modal Anahtarı Bulunamadı'.$request->key, 1);
    }

    public function createUser(Request $request)
    {
        return response()->json([
            'data' => view('kobiyim.system.modals.users.create')->render(),
        ]);
    }

    public function editUser(Request $request)
    {
        return response()->json([
            'data' => view('kobiyim.system.modals.users.edit', [
                'get' => User::find($request->id),
            ])->render(),
        ]);
    }

    public function createPermission(Request $request)
    {
        return response()->json([
            'data' => view('kobiyim.system.modals.permissions.create')->render(),
        ]);
    }

    public function editPermission(Request $request)
    {
        return response()->json([
            'data' => view('kobiyim.system.modals.permissions.edit', [
                'get' => Permission::find($request->id),
            ])->render(),
        ]);
    }
}
