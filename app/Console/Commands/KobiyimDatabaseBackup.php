<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Console\Commands;

use App\Models\Backup;
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

        $filename = now()->format('Ymd-Hi').'.sql';
        $dir = storage_path('backup/'.$filename);

        MySql::create()
            ->setDbName(env('DB_DATABASE'))
            ->setUserName(env('DB_USERNAME'))
            ->setPassword(env('DB_PASSWORD'))
            ->includeTables(env('BACKUPTABLES'))
            ->dumpToFile($dir);

        Backup::create([
            'filename'  => $filename,
            'dir'       => $dir,
            'type'      => 'sql',
            'size'      => \File::size($dir),
            'is_loaded' => 0,
        ]);

        $this->info('Sunucu üzerine veritabanı yedeklemesi tamamlandı.');
    }
}
