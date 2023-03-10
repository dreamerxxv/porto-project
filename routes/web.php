<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
});

Route::get('/auth', [AuthController::class, "index"]);
Route::get('/auth/redirect', [AuthController::class, "redirect"]);
Route::get('/auth/callback', [AuthController::class, "callback"]);

Route::get('/dashboard', function() {
    return  'Selamat Datang' .Auth::user()->name. 'Website';
});