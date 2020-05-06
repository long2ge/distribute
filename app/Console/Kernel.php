<?php

namespace App\Console;

use App\Console\Commands\AppInitCommand;
use App\Console\Commands\AppUpdateCommand;
use App\Console\Commands\TestCommand;
use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        AppInitCommand::class,
        TestCommand::class,
        AppUpdateCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /**
         * ==========================================
         * 每分钟执行一次,自动取消订单
         * ==========================================
         */
        // $schedule->command('test:start')->everyMinute();
    }

}
