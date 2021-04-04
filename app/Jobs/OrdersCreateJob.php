<?php

namespace App\Jobs;

use App\Models\SplitCycle;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Osiset\ShopifyApp\Objects\Values\ShopDomain;
use stdClass;

class OrdersCreateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Shop's myshopify domain
     *
     * @var ShopDomain|string
     */
    public $shopDomain;

    /**
     * The webhook data
     *
     * @var object
     */
    public $data;

    /**
     * Create a new job instance.
     *
     * @param string   $shopDomain The shop's myshopify domain.
     * @param stdClass $data       The webhook data (JSON decoded).
     *
     * @return void
     */
    public function __construct($shopDomain, $data)
    {
        $this->shopDomain = $shopDomain;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Convert domain
        $this->shopDomain = ShopDomain::fromNative($this->shopDomain);

        // Do what you wish with the data
        // Access domain name as $this->shopDomain->toNative()

        collect($this->data->line_items)->each(function ($lineItem) {
            $SplitCycle = SplitCycle::where([
                'status' => SplitCycle::RUNNING,
                'variant_id' => $lineItem->variant_id
            ])->first();

            if (!$SplitCycle) return;

            $SplitCycle->Orders()->create([
                'quantity' => $lineItem->quantity,
                'order_shopify_id' => $this->data->id,
                'price' => $lineItem->price,
                'total_price' => $lineItem->quantity * $lineItem->price,
                'line_item_id' => $lineItem->id
            ]);
        });
    }
}
