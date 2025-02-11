<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Http\Controllers\Kobiyim;

use App\Http\Services\Kobiyim\User\Destroy;
use App\Http\Services\Kobiyim\User\Json;
use App\Http\Services\Kobiyim\User\SavePermission;
use App\Http\Services\Kobiyim\User\Store;
use App\Http\Services\Kobiyim\User\Update;
use App\Models\Permission;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('kobiyim.system.users.index');
    }

    public function json(Request $request)
    {
        return (new Json)->handle($request);
    }

    public function store(Request $request)
    {
        return (new Store)->handle($request);
    }

    public function update(Request $request, $id)
    {
        return (new Update)->handle($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return (new Destroy)->handle($request, $id);
    }

    public function permission(Request $request, $id)
    {
        $data = [
            'all'  => Permission::all(),
            'user' => UserPermission::where('user_id', $id)->get()->groupBy('permission_id')->toArray(),
            'get'  => User::find($id),
        ];

        return view('kobiyim.system.users.permission', $data);
    }

    public function savePermission(Request $request, $id)
    {
        return (new SavePermission)->handle($request, $id);
    }
}
