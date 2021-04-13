<?php

namespace App\Http\Controllers;

use App\Models\SplitTest;

class SplitTestController extends Controller
{
    public function show(SplitTest $splitTest)
    {
        return view('experiments.split-test.show', [
            'splitTest' => $splitTest
        ]);
    }
}
