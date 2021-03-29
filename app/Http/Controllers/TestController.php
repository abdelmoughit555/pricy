<?php

namespace App\Http\Controllers;

use App\Jobs\SplitTest\StartSplitTest;
use App\Models\SplitTest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $shop = auth()->user()->api()->rest('GET', '/admin/shop.json')['body']['shop'];
        dd($shop);
    }
}
