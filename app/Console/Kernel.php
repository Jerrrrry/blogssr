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
        'App\Console\Commands\Testnews',
        'App\Console\Commands\Newssources',
        'App\Console\Commands\Eachsourcetopten',
        'App\Console\Commands\Marvelcharacters',
        'App\Console\Commands\Homearticles',
        'App\Console\Commands\Topmovies',
        'App\Console\Commands\Slidercache',
        'App\Console\Commands\Twittertest',
        'App\Console\Commands\Rose',

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('newssources')->daily();
        $schedule->command('eachsourcetopten')->dailyAt('06:00');
        $schedule->command('eachsourcetopten')->dailyAt('17:00');
        $schedule->command('homearticles')->hourly();
        $schedule->command('topmovies')->hourly();
        $schedule->command('slidercache')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
