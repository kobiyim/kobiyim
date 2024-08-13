<?php

/**
 * Kobiyim
 *
 * @version v2.0.0
 */

namespace App\Auth\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NewPasswordController extends \Illuminate\Routing\Controller
{
    public function create(Request $request)
    {
        return view('kobiyim.auth.reset-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required|size:16',
            'code' => 'required|size:6',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('phone', $request->phone)->first();

        if ($user != null and Hash::check($request->code, $user->remember_token)) {
            activityRecord([
                'description' => 'Kullanıcı şifresini değiştirdi.',
                'subject_type' => 'App\Models\User',
                'subject_id' => $user->id,
                'causer_id' => $user->id,
            ]);

            $user->update([
                'password' => Hash::make($request->password),
                'remember_token' => null,
                'remember_expires_at' => null,
            ]);

            return redirect()->route('dashboard')->with(['message' => 'Şifreniz sıfırlandı. Şimdi giriş yapabilirsiniz.']);
        } elseif ($user != null and $user->remember_expires_at > now()) {
            return view('kobiyim.auth.reset-password')->with(['status' => 'Geçersiz kod girişi yapıldı. Lütfen tekrar deneyiniz.']);
        } else {
            return redirect()->route('password.reset')->with(['status' => 'Lütfen bilgilerinizi tekrar kontrol ediniz.']);
        }
    }
}
