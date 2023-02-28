<?php

use App\Http\Controllers\NewController;
use App\Http\Controllers\SocialiteController;
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
    return view('index');
})->name('index');

Route::get("login-register", [SocialiteController::class, 'loginRegister'])->name('socialite.login-register');
Route::resource('new', NewController::class);

Route::get('/auth/github', [SocialiteController::class, 'redirectToProvider'])->name('github.auth');
Route::get('/auth/github/callback', [SocialiteController::class, 'handleProviderCallback'])->name('github.redirect');
