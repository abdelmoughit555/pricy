<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Jobs\SplitTest\StartSplitTest;
use App\Models\SplitTest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->middleware(['auth.shopify'])->name('home');

Route::prefix('/create-experiment')->middleware(['auth.shopify'])->group(function () {
    Route::get('/', function () {
        return view('experiments.create-experiment');
    });

    Route::get('/split-test', function () {
        return view('experiments.split-test.create');
    });
});

Route::get('/test', [TestController::class, 'index'])->middleware(['auth.shopify'])->name('test');;

/* $splitTest = SplitTest::with('splitCycles')->first();
foreach ($splitTest->splitCycles as $splitCycle) {
    StartSplitTest::dispatch(auth()->user(), $splitCycle);
} */
    /*     $splitTest = SplitTest::with('splitCycles')->first();
    $splitTest->splitCycles->each(function ($splitCycle) {
        $splitCycle->delete();
    });

    $splitTest->delete(); */
