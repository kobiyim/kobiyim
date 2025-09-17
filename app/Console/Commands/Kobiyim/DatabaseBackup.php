<?php

/**
 * Kobiyim
 *
 * @version v4.0.0
 */

namespace App\Console\Commands\Kobiyim;

use App\Models\Kobiyim\Backup;
use Illuminate\Console\Command;
use Spatie\DbDumper\Databases\MySql;

class KobiyimDatabaseBackup extends Command
{
    protected $signature = 'kobiyim:databasebackup';

    protected $description = 'Veritabanı sunucu içerisine yedekleme işlemi';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Yedekleme başlatıldı.');

        \File::ensureDirectoryExists(storage_path('backup'));

        $filename = now()->format('Ymd-Hi').'.sql';
        $dir = storage_path('backup/'.$filename);

        try {
            MySql::create()
                ->setDbName(config('database.connections.mysql.database'))
                ->setUserName(config('database.connections.mysql.username'))
                ->setPassword(config('database.connections.mysql.password'))
                ->includeTables(config('kobiyim.backuptables'))
                ->dumpToFile($dir);

            if (\File::size($dir) === 0) {
                throw new \Exception("Dump dosyası boş oluşturuldu.");
            }

            Backup::create([
                'filename'  => $filename,
                'dir'       => $dir,
                'type'      => 'sql',
                'size'      => \File::size($dir),
                'is_loaded' => 0,
            ]);

            $this->info('Sunucu üzerine veritabanı yedeklemesi tamamlandı.');
        } catch (\Exception $e) {
            $this->error("Yedekleme hatası: ".$e->getMessage());
            return 1;
        }
    }
}
