<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Console\Commands;

use App\Models\Backup;
use Illuminate\Console\Command;

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
        $this->info('Yedekleme başlatıldı.');

        $backupFilename = now()->format('Ymd-Hi').'.zip';
        $backupDir = storage_path('backup/'.$backupFilename);

        $dirsToZip = env('BACKUPFILES');

        foreach (explode(';', $dirsToZip) as $dir) {

            $zip = new \ZipArchive;

            $input_folder = realpath(base_path($dir));

            $addDirDo = static function ($input_folder, $name) use ($zip, &$addDirDo) {
                $name .= '/';
                $input_folder .= '/';
                // Read all Files in Dir
                $dir = opendir($input_folder);
                while ($item = readdir($dir)) {
                    if ($item == '.' || $item == '..') {
                        continue;
                    }
                    $itemPath = $input_folder.$item;
                    if (filetype($itemPath) == 'dir') {
                        $zip->addEmptyDir($name.$item);
                        $addDirDo($input_folder.$item, $name.$item);
                    } else {
                        $zip->addFile($itemPath, $name.$item);
                    }
                }
            };

            if ($input_folder !== false) {
                $res = $zip->open($backupDir, \ZipArchive::CREATE);
                if ($res === true) {
                    $zip->addEmptyDir(basename($input_folder));
                    $addDirDo($input_folder, basename($input_folder));

                    $zip->close();

                    Backup::create([
                        'filename'  => $backupFilename.'.zip',
                        'dir'       => $backupDir,
                        'type'      => 'zip',
                        'size'      => \File::size($backupDir),
                        'is_loaded' => 0,
                    ]);
                } else {
                    exit('Could not create a zip archive, migth be write permissions or other reason.');
                }
            }

        }

        $this->info('Sunucu üzerine dosyaların yedeklemesi tamamlandı.');
    }
}
