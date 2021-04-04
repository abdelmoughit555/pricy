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
        $user = User::first();
        $splitTests = $user->splitTests()->withSum('orders', 'quantity')->paginate();

        return view('test', [
            'splitTests' => $splitTests
        ]);
    }
}
