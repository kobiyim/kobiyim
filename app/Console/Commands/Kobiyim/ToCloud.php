<?php

/**
 * Kobiyim
 *
 * @version v4.0.0
 */

namespace App\Console\Commands\Kobiyim;

use App\Models\Kobiyim\Backup;
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
            if (!\File::exists($file->dir)) {
                $this->error("Dosya bulunamadı: {$file->dir}");
                continue;
            }

            try {
                \Storage::disk('digitalocean')->put(
                    config('kobiyim.username')."/{$file->type}/{$file->filename}",
                    \File::get($file->dir)
                );

                $file->update(['is_loaded' => 1]);
                $this->info("Yüklendi: {$file->filename}");
            } catch (\Exception $e) {
                $this->error("Hata ({$file->filename}): {$e->getMessage()}");
            }
        }

        $this->info('Buluta dosya aktarımları tamamlandı.');
    }
}
