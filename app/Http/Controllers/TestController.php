<?php

namespace App\Http\Controllers;

use App\Jobs\SplitTest\StartSplitTest;
use App\Models\SplitTest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $splitTest = SplitTest::with('splitCycles')->first();
        $splitTest->splitCycles->each(function ($splitCycle) {
            $splitCycle->delete();
        });
        $splitTest->delete();

        /*        $updatePrice = auth()->user()->api()->rest(
            'PUT',
            "/admin/api/variants/39299535208655.json",
            ['query' => [
                'variant' => [
                    'id' => '39299535208655',
                    'price' => "333"
                ]
            ]]
        );

        return $updatePrice; */
    }
}
