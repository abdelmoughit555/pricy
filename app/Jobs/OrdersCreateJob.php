<?php

namespace App\Jobs;

use App\Models\Order;
use App\Models\SplitCycle;
use App\Models\User;
use App\Models\Variant;
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
        $this->shopDomain = ShopDomain::fromNative($this->shopDomain);
        $name = $this->shopDomain->toNative();
        $user = User::where('name', $name)->first();

        collect($this->data->line_items)->each(function ($lineItem) use ($user) {
            $variant = Variant::whereHas('splitCycle', function ($query) {
                $query->where('status', SplitCycle::FINISHED);
            })->where('variant_id', $lineItem->variant_id)
                ->first();


            if (!$variant) return;

            Order::create([
                'shop_id' => $user->id,
                'variant_id' => $variant->id,
                'quantity' => $lineItem->quantity,
                'order_shopify_id' => $this->data->id,
                'price' => $lineItem->price,
                'total_price' => $lineItem->quantity * $lineItem->price,
                'line_item_id' => $lineItem->id
            ]);
        });
    }
}
