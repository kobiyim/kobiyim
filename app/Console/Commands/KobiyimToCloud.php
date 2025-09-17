<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Console\Commands;

use App\Models\Backup;
use Illuminate\Console\Command;

class KobiyimToCloud extends Command
{
    protected $signature = 'kobiyim:tocloud';

    protected $description = 'Yedekleme işlemini tamamlamış buluta yüklenmesi hazır dosyalar için aktarım yapar';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Buluta aktarım başlatıldı.');

        $files = Backup::where('is_loaded', 0)->get();

        foreach ($files as $file) {
            \Storage::disk('digitalocean')->put(env('KOBIYIM_USERNAME').'/'.$file->type.'/'.$file->filename, \File::get($file->dir));

            $file->update([
                'is_loaded' => 1,
            ]);
        }

        $this->info('Buluta dosya aktarımları tamamlandı.');
    }
}
