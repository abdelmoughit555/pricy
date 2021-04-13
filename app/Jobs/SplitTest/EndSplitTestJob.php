<?php

namespace App\Jobs\SplitTest;

use App\Events\SplitTestEndedEvent;
use App\Models\SplitCycle;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EndSplitTestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $splitCycle;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(SplitCycle $splitCycle)
    {
        $this->splitCycle = $splitCycle;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $showOwner = $this->splitCycle->splitTest->shopOwner;
        $product = $this->splitCycle->splitTest->product;
        $variants = $this->splitCycle->variants;

        $variantQuery = [];
        foreach ($variants as $variant) {
            array_push($variantQuery, [
                'id' => $variant->variant_id,
                'price' => $variant->old_price
            ]);
        }

        $showOwner->api()->rest(
            'PUT',
            "/admin/api/products/{$product->shopify_product_id}.json",
            ['product' => [
                'id' => $product->shopify_product_id,
                'variants' => $variantQuery
            ]]
        );

        $this->splitCycle->update([
            'status' => SplitCycle::FINISHED
        ]);

        event(new SplitTestEndedEvent($this->splitCycle->splitTest));
    }
}
