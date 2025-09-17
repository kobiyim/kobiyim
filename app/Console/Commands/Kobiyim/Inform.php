<?php

/**
 * Kobiyim
 *
 * @version v4.0.0
 */

namespace App\Console\Commands\Kobiyim;

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
        $this->info('İsteklerinize özel yönetim panelini geliştirmeye başlayabilirsiniz.');
        $this->info('Bu süreçte kobiyim:install komutu ile ilk ayarları yapabilirsiniz.');
        $this->info('İyi Çalışmalar');
    }
}
