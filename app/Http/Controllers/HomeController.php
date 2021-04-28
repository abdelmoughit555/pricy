<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->firstConnection()) {
            $user->update(['first_connection_at' => Carbon::now()]);
            return redirect('/tutorial');
        }

        return view('home');
    }
}
