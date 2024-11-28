<?php

/**
 * Kobiyim
 *
 * @version v3.0.0
 *
 */

use App\Console\Commands\KobiyimBackup;
use Illuminate\Support\Facades\Schedule;

Schedule::command(KobiyimBackup::class)->dailyAt('12:45');
Schedule::command(KobiyimBackup::class)->dailyAt('19:00');