<?php

namespace App\Jobs\SplitTest;

use App\Models\SplitCycle;
use App\Models\SplitTest;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StartSplitTest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $splitCycle;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, SplitCycle $splitCycle)
    {
        $this->user  = $user;
        $this->splitCycle = $splitCycle;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->user->api()->rest(
            'PUT',
            "/admin/api/variants/{$this->splitCycle->variant_id}.json",
            ['query' => [
                'variant' => [
                    'id' => $this->splitCycle->variant_id,
                    'price' => $this->splitCycle->price
                ]
            ]]
        );
    }
}
