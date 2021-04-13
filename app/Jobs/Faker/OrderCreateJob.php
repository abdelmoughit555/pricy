<?php

namespace App\Jobs\Faker;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class OrderCreateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::first();

        return $user->api()->rest('POST', '/admin/orders.json', [
            'order' => [
                'line_items' => [
                    [
                        "variant_id" => 39316475609295,
                        "quantity" => 3
                    ],
                    [
                        "variant_id" => 39316475642063,
                        "quantity" => 2
                    ],
                    [
                        "variant_id" => 39316475707599,
                        "quantity" => 6
                    ],
                    [
                        "variant_id" => 39316475740367,
                        "quantity" => 6
                    ],
                ]
            ]
        ]);
    }
}
