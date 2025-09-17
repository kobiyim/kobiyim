<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;

class KobiyimInform extends Command
{
    protected $signature = 'kobiyim:inform';

    protected $description = 'Kobiyim sunar.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Kobiyim e hoşgeldiniz.');
        $this->info('İsteklerinize özel yönetim panelini hızla ayağa kaldırmaya başlayabilirsiniz.');
        $this->info('Bu süreçte kobiyim:install komutu ile ilk ayarları yapabilirsiniz.');
        $this->info('İyi Çalışmalar');
    }
}
