<?php

/**
 * Kobiyim.
 *
 * @since v1.0.23
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
        $files = Backup::where('is_loaded', 0)->all();

        foreach ($files as $file) {
            \Storage::disk('digitalocean')->put(env('KOBIYIMUSERNAME') . '/' . $filename . '.sql', \File::get(storage_path('app/backup/' . $filename . '.sql')));

            $file->update([
                'is_loaded' => 1,
            ]);
        }
    }
}
