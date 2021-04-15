<?php

namespace App\Jobs;

use App\Models\Product;
use App\Models\SplitTest;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Osiset\ShopifyApp\Objects\Values\ShopDomain;
use stdClass;

class ProductsUpdateJob implements ShouldQueue
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
        $name = $this->shopDomain->toNative();

        $user = User::where('name', $name)->first();
        $data = $this->data;

        $product = $user->products()->where('shopify_product_id', $data->id)->first();

        if (!$product) return;

        if (!$product->hasActiveSplitTest()) {
            $product->update([
                'title' => $data->title,
                'image' => $data->image->src,
                'shopify_product_id' => $data->id
            ]);
            return;
        }

        $splitTest = $product->splitTests->whereIn('status', [SplitTest::RUNNING, SplitTest::PENDING])->first();

        if ($this->data->title != $product->title) {
            $product->deleteRelatedRelationship();
        }
        foreach ($this->data->variants as $variant) {
            $currentVariant = $splitTest->variants->where('variant_id', $variant->id)->first();
            //deleted variants
            if (!$currentVariant) {
                $product->deleteRelatedRelationship();
                break;
            }

            if ($currentVariant->variant_name != $variant->title) {
                $product->deleteRelatedRelationship();
                break;
            }
            //changed new price
            if ($splitTest->status == SplitTest::RUNNING && $currentVariant->new_price != $variant->price) {
                $product->deleteRelatedRelationship();
                break;
            }
            //changed old price
            if ($splitTest->status == SplitTest::PENDING && $currentVariant->old_price != $variant->price) {
                $product->deleteRelatedRelationship();
                break;
            }
        }
    }
}
