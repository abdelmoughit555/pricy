<?php

namespace App\Http\Controllers;

use App\Http\Resources\DashboardCollection;
use App\Jobs\SplitTest\StartSplitTest;
use App\Models\SplitCycle;
use App\Models\SplitTest;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $shop = User::first();

        $showOwner = $shop;
        $splitCycle = SplitCycle::find(24);
        $product = $splitCycle->splitTest->product;
        $variants = $splitCycle->variants;

        /*         dd(['variant' => [
            'id' => $variants[0]->variant_id,
            'price' => $variants[0]->new_price,
        ]]); */
        $variantQuery = [];
        foreach ($variants as $variant) {
            array_push($variantQuery, [
                'id' => $variant->variant_id,
                'price' => $variant->new_price
            ]);
        }
        $response = $showOwner->api()->rest(
            'GET',
            "/admin/api/products/{$product->shopify_product_id}.json",
            ['product' => [
                'id' => $product->shopify_product_id,
                'variants' => $variantQuery
            ]]
        );

        return $response;
    }
}
