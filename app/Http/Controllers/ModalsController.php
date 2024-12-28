<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class ModalsController extends Controller
{
    public function __invoke(Request $request)
    {
        // bu derleyici içine erişebilmek için key olmak zorunda
        if ($request->has('key') and method_exists($this, $request->key)) {
            return $this->{$request->key}($request);
        }

        return throw new Exception('Modal Anahtarı Bulunamadı'.$request->key, 1);
    }
}
