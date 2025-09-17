<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function dashboard()
    {
        return view('welcome');
    }
}
