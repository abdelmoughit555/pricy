<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return $user->splitTests()->count() > 0 ? view('home') : redirect('/tutorial');
    }
}
