<?php

/**
 * Kobiyim
 *
 * @version v2.0.0
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


        $dirsToZip = env('BACKUPFILES');

        foreach (explode(';', $dirsToZip) as $dir) {

            $zip = new \ZipArchive();

            $input_folder = realpath(base_path($dir));

            $addDirDo = static function($input_folder, $name) use ($zip, &$addDirDo ) {
                $name .= '/';
                $input_folder .= '/';
                // Read all Files in Dir
                $dir = opendir ($input_folder);
                while ($item = readdir($dir))    {
                    if ($item == '.' || $item == '..') continue;
                    $itemPath = $input_folder . $item;
                    if (filetype($itemPath) == 'dir') {
                        $zip->addEmptyDir($name . $item);
                        $addDirDo($input_folder . $item, $name . $item);
                    } else {
                        $zip->addFile($itemPath, $name . $item);
                    }
                }
            };

            if($input_folder !== false) {
                $res = $zip->open(storage_path('app/backup/' . rand(10000,9999999) . '.zip'), \ZipArchive::CREATE);
                if($res === true)   {
                    $zip->addEmptyDir(basename($input_folder));
                    $addDirDo($input_folder, basename($input_folder));

                    Backup::create([
                        'filename' => $filename . '.zip',
                        'dir' => storage_path('app/backup/' . $filename . '.zip'),
                        'type' => 'zip',
                        'size' =>0,
                        'is_loaded' => 0,
                    ]);

                    $zip->close(); 
                } else {
                    exit ('Could not create a zip archive, migth be write permissions or other reason.');
                }
            }

        }


    }
}
