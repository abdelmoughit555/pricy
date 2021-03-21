<?php

namespace App\Console\Commands;

use App\Jobs\SplitTest\EndSplitTestJob;
use App\Models\SplitCycle;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SplitTestFinisherCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'splittest:end';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        SplitCycle::where([
            'end_at' => Carbon::today(),
            'status' => SplitCycle::RUNNING
        ])->cursor()
            ->each(function ($splitCycle) {
                EndSplitTestJob::dispatch($splitCycle);
            });
    }
}
