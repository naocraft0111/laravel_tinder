<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SwipeController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(UserController::class)->middleware(['auth'])
->group(function() {
    // スワイプページ
    Route::get('/users', 'index')->name('users.index');
});

Route::post('/swipes', [SwipeController::class, 'store'])->middleware('auth')->name('swipes.store');
