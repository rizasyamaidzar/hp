<?php

use App\Models\Bobot;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HPController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\RangkingController;
use App\Http\Controllers\DashboardController;

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
    return view('login');
});

Route::get('/bobot', function () {
    return view('bobot');
})->middleware('auth');

Route::get('/alternatif', function () {
    return view('alternatif');
})->middleware('auth');

Route::get('/tambahData', function () {
    return view('tambahDataKriteria');
})->middleware('auth');

Route::get('/tambahAlternatif', function () {
    return view('tambahAlternatif');
})->middleware('auth');

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::resource('/bobot',BobotController::class)->middleware('auth');

Route::resource('/alternatif',HPController::class)->middleware('auth');

Route::resource('/ranking',RangkingController::class)->middleware('auth');
// Route::resource('/dashboard',DashboardController::class);

Route::get('/profil', [BiodataController::class,'index'])->middleware('auth');
Route::get('/dashboard', [DashboardController::class,'index'])->middleware('auth');