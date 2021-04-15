<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->splitTests->count() == 0) {
            return redirect('/tutorial');
        }

        return view('home');
    }
}
