<?php

/**
 * Kobiyim
 *
 * @since v1.0.5
 */

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function dashboard()
    {
        return view('welcome');
    }
}
