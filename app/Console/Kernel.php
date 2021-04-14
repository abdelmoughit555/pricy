<?php

namespace App\Console;

use App\Console\Commands\{OrderFaker, SplitTestFinisherCommand, SplitTestStarterCommand};
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
        SplitTestStarterCommand::class,
        SplitTestFinisherCommand::class,
        OrderFaker::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('faker:order')->everyMinute();
        //run split test of today
        $schedule->command('splittest:start')->daily();
        //end split test of today
        $schedule->command('splittest:end')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
