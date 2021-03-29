<?php

namespace App\Jobs\Product;

use App\Models\User;
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
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $shop = auth()->user();

        if ($shop->alreadyImportatedProducts()) return;

        $count = $shop->countProducts();

        $shop->importProducts($count);

        $shopInfo = $shop->api()->rest('GET', '/admin/shop.json')['body']['shop'];

        $shop->update([
            'currency' => $shopInfo['currency'],
            'country' => $shopInfo['country']
        ]);
    }
}
