<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    // 'App\Console\Commands\LockPayments',

       'App\Console\Commands\CustomCommand', 

       'App\Console\Commands\Moratorium'
   ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        // $schedule->command('lock:payments')->everyMinute();

        $schedule->command('command:cut')->dailyAt('23:59');

        $schedule->command('command:moratorium')->dailyAt('20:15');

    }
}
