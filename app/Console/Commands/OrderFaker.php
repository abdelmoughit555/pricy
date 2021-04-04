<?php

namespace App\Console\Commands;

use App\Jobs\Faker\OrderCreateJob;
use Illuminate\Console\Command;

class OrderFaker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'faker:order';

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
        return OrderCreateJob::dispatch();
    }
}
