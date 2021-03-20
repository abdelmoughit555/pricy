<?php

namespace App\Jobs\Product;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\LazyCollection;

class ImportProducts implements ShouldQueue
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
        $shop = auth()->user();

        if (auth()->user()->alreadyImportatedProducts()) return;

        $products = $shop->api()->rest('GET', '/admin/products.json', [
            'query' => "fields=id,image,title"
        ])['body']['products'];

        LazyCollection::make($products)->each(function ($product) use ($shop) {
            $shop->storeProduct($product);
        });

        $shop->fistConnectionAndImportatedAt();
    }
}
