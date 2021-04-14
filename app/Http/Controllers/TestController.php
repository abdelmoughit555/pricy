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


        $response = $shop->api()->rest(
            'GET',
            "/admin/api/products/6553893372111.json"
        );

        return $response;
    }
}
