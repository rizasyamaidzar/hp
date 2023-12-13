<?php

use App\Http\Controllers\BobotController;
use App\Models\Bobot;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('bobot');
});

Route::get('/bobot', function () {
    return view('bobot');
});

Route::resource('/bobot',BobotController::class);

