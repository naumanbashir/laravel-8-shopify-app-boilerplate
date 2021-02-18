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

//Route::get('/', fn() => view('auth.login'));

//Route::prefix('admin')->middleware(['auth:sanctum', 'verified', 'auth.isAdmin'])->group(function (){
//
//});

Route::get('/login', function () {
    if (Auth::user()) {
        return redirect()->route('home');
    }
    return view('login');
})->name('login');

//Route::get('/', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');

Route::get('/', function () {
    return view('admin.dashboard');
})->middleware(['auth.shopify'])->name('home');

Route::middleware(['auth.shopify'])->group(function(){
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});
