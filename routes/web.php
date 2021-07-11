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
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::resource('/dashboard', App\Http\Controllers\DashboardController::class)->middleware(['auth','verified']);
Route::get('/logout',[App\Http\Controllers\User::class, 'logout'])->name('logout')->middleware(['auth']);
Route::get('/account',[App\Http\Controllers\User::class, 'account'])->name('account')->middleware(['auth','verified']);
Route::put('/update',[App\Http\Controllers\User::class,'update'])->name('update_account')->middleware('auth','verified');
