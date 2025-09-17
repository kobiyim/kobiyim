<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class KobiyimUser extends Command
{
    protected $signature = 'kobiyim:user';

    protected $description = 'Kobiyim içerisine yeni kullanıcı oluştur';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Kullanıcı ekleme ekranına hoşgeldiniz.');
        $this->info('Bu ekranda eklediğiniz kullanıcı aktif olarak kullanabilirsiniz.');

        $name = $this->ask('Adınız');

        $phone = $this->ask('Telefon numaranız 0 (000) 000 0000');

        $password = $this->secret('Şifreniz');

        $type = $this->choice(
            'Kullanıcı türü',
            ['Kullanıcı', 'Yönetici'],
            0,
        );

        $validator = Validator::make(
            [
                'name'     => $name,
                'phone'    => $phone,
                'password' => $password,
                'type'     => $type,
            ],
            [
                'name'     => 'required|min:3|max:128',
                'phone'    => 'required|size:16|unique:users,phone',
                'password' => 'required|min:8',
                'type'     => 'required',
            ],
            [
                'name.required'  => 'Kullanıcı adı girmelisiniz.',
                'name.min'       => 'Kullanıcı adı en az 3 karakter olmalıdır.',
                'name.max'       => 'Kullanıcı adı maksimum 128 karakter olabilir.',
                'phone.required' => 'Telefon alanı gereklidir.',
                'phone.unique'   => 'Telefon numarası önceden kayıt edilmiş.',
            ],
        );

        if ($validator->passes()) {
            User::create([
                'name'      => $name,
                'phone'     => $phone,
                'password'  => Hash::make($password),
                'is_active' => 1,
                'type'      => ($type == 1) ? 'admin' : 'user',
            ]);
        } else {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            $this->handle();
        }

        $this->info('Kullanıcı oluşturuldu.');
        $this->info('İyi Çalışmalar');
    }
}
