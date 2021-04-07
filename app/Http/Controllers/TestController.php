<?php

namespace App\Http\Controllers;

use App\Http\Resources\DashboardCollection;
use App\Jobs\SplitTest\StartSplitTest;
use App\Models\SplitTest;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $shop = User::first();

        /*         if ($shop->alreadyImportatedProducts()) return; */

        $count = $shop->countProducts();

        $shop->importProducts($count);

        $shopInfo = $shop->api()->rest('GET', '/admin/shop.json')['body']['shop'];

        $shop->update([
            'currency' => $shopInfo['currency'],
            'country' => $shopInfo['country']
        ]);
    }
}
