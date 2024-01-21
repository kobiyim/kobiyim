<?php

/**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.0
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class KobiyimUser extends Command
{
    protected $signature = 'kobiyim:user';

    protected $description = 'Veritabanının yedeğini alın';

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

        User::create([
            'name' => $name,
            'phone' => $phone,
            'password' => Hash::make($password),
            'is_active' => 1,
        ]);

        $this->info('Kullanıcı oluşturuldu.');
        $this->info('İyi Çalışmalar');
    }
}
