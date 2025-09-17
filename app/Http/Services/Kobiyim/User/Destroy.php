<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Http\Services\Kobiyim\User;

use App\Models\User;
use Illuminate\Http\Request;

class Destroy
{
    public function handle(Request $request, $id)
    {
        $get = User::find($id);

        $get->update([
            'is_active' => ($get['is_active'] == 1) ? 0 : 1,
        ]);

        activityRecord([
            'subject_type' => 'App\Models\User',
            'subject_id'   => $id,
            'description'  => 'Kullanıcı durumu değiştirildi.',
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Kullanıcı aktifliği '.(($get['is_active'] == 1) ? 'aktif' : 'pasif').' olarak değiştirildi.',
        ]);
    }
}
