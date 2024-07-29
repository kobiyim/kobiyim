<?php

/**
 * Kobiyim.
 *
 * @since v1.0.23
 */

namespace App\Console\Commands;

use App\Models\Backup;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class KobiyimFileBackup extends Command
{
    protected $signature = 'kobiyim:filebackup';

    protected $description = 'Dosya yedeklemelerini sıkıştırıp kayıt eder';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $zip = new \ZipArchive();

        $filename = now()->format('Ymd-Hi');

        if ($zip->open(storage_path('backup/' . $filename . '.zip'), \ZipArchive::CREATE) == true) {
            $dirsToZip = env('BACKUPFILES');

            foreach (explode(';', $dirsToZip) as $dir) {
                $this->info($dir . ' için sıkıştırma başlatılıyor.');
                foreach (Storage::allFiles($dir) as $e) {
                    $zip->addFile($e, basename($e));
                }
            }

            $zip->close();

            Backup::create([
                'filename' => $filename . '.zip',
                'dir' => storage_path('backup/' . $filename . '.zip'),
                'type' => 'zip',
                'size' => Storage::size(storage_path('backup/' . $filename . '.zip')),
                'is_loaded' => 0,
            ]);

            $this->info('Sıkıştırma işlemi tamamlandı yedek dosyası oluşturuldu.');
        }
    }
}
