<?php

/**
 * Kobiyim
 *
 * @since v1.0.0
 */

namespace App\Http\Controllers\Kobiyim;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function arrangeErrors($errors)
    {
        $data = [];

        foreach ($errors as $key => $errorDetails) {
            $data[] = [
                'key' => $key,
                'message' => implode(' ', $errorDetails),
            ];
        }

        return $data;
    }
}
