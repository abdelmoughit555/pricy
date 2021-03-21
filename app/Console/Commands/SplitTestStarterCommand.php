<?php

namespace App\Console\Commands;

use App\Jobs\SplitTest\StartSplitTestJob;
use App\Models\SplitCycle;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SplitTestStarterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'splittest:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the split test';

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
            'start_at' => Carbon::today(),
            'status' => SplitCycle::PENDING
        ])->cursor()
            ->each(function ($splitCycle) {
                StartSplitTestJob::dispatch($splitCycle);
            });
    }
}
