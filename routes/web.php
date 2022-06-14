<?php

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

Route::get('/', function () {
    return view('clock', [
        'initialNumberOfPlayers' => 2,
        'minimumPlayers' => 1,
        'maximumPlayers' => 16,
        'initialSeconds' => 20,
        'incrementSeconds' => 5,
        'delaySeconds' => 0,
    ]);
});
