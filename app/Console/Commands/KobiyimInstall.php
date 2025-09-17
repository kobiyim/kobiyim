<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;

class KobiyimInstall extends Command
{
    protected $signature = 'kobiyim:install';

    protected $description = 'Kobiyim ilk kurulumunu çalıştırır';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Kobiyim e hoşgeldiniz.');
        $this->info('İlk kurulum ekranı çalıştırıyoruz.');
        $this->info('Veritabanı bağlantı ayarlarını yaptınız mı?');

        if ($this->confirm('Tabloları oluşturmak ister misiniz?')) {
            $this->call('migrate');
            $this->info('Tablolar oluşturuldu.');

            if ($this->confirm('İlk kullanıcıyı oluşturmak misiniz?')) {
                $this->call('kobiyim:user');
            }
        }

        $this->info('Kobiyim e hoşgeldiniz. İyi Çalışmalar.');
    }
}
