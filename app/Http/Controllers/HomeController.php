<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $splitTests = $user->splitTests()->withCount('splitCycles')->withSum('orders', 'quantity')->paginate();

        $dataChart = $user->orders()->createdLast(7)->get();

        if (is_null($splitTests)) {
            return redirect('/tutorial');
        }

        return view('home', [
            'splitTest' => $splitTests,
            'dataChart' => $dataChart
        ]);
    }
}
