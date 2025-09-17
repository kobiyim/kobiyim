<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Http\Controllers\Kobiyim;

use App\Http\Services\Kobiyim\Permission\Destroy;
use App\Http\Services\Kobiyim\Permission\Json;
use App\Http\Services\Kobiyim\Permission\Store;
use App\Http\Services\Kobiyim\Permission\Update;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        return view('kobiyim.system.permissions.index');
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
}
