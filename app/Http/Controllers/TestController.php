<?php

namespace App\Http\Controllers;

use App\Jobs\SplitTest\StartSplitTest;
use App\Models\SplitTest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $shop = auth()->user();
        $count = $shop->countProducts();

        $shop->importProducts($count);
    }
}
