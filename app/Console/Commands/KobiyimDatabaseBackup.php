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
        $filename = now()->format('Ymd-Hi');

        MySql::create()
            ->setDbName(env('DB_DATABASE'))
            ->setUserName(env('DB_USERNAME'))
            ->setPassword(env('DB_PASSWORD'))
            ->includeTables(env('BACKUPTABLES'))
            ->dumpToFile(storage_path('backup/' . $filename . '.sql'));

        Backup::create([
            'filename' => $filename . '.sql',
            'dir' => storage_path('backup/' . $filename . '.sql'),
            'type' => 'sql',
            'size' => Storage::size(storage_path('backup/' . $filename . '.sql')),
            'is_loaded' => 0,
        ]);
    }
}
