<?php

/**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.12
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\DbDumper\Databases\MySql;

class KobiyimBackup extends Command
{
    protected $signature = 'kobiyim:backup';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if(env('APP_ENV') == 'live') {
            try {
                $filename = now()->format('Ymd-Hi');

                MySql::create()
                    ->setDbName(env('DB_DATABASE'))
                    ->setUserName(env('DB_USERNAME'))
                    ->setPassword(env('DB_PASSWORD'))
                    ->includeTables(env('BACKUPTABLES'))
                    ->dumpToFile(storage_path('app/backup/'.$filename.'.sql'));

                \Storage::disk('digitalocean')->put(env('KOBIYIMUSERNAME').'/'.$filename.'.sql', \File::get(storage_path('app/backup/'.$filename.'.sql')));
            } catch (\Exception $e) {
            }
        }
    }
}
