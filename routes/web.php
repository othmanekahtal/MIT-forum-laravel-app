<?php

use Illuminate\Support\Facades\DB;
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

Auth::routes(['verify' => true]);
Route::get('/dashboard', [App\Http\Controllers\Questions::class, 'all'])
    ->name('dashboard');
Route::get('/question/{id}', [App\Http\Controllers\Questions::class, 'question'])->where
('id', '[0-9]+');
Route::get('/logout', [App\Http\Controllers\User::class, 'logout'])->name('logout');
Route::get('/account', [App\Http\Controllers\User::class, 'account'])->name('account');
Route::post('/update', [App\Http\Controllers\User::class, 'update'])->name('update_account');
Route::get('/delete/{id}', [App\Http\Controllers\User::class, 'delete'])->where('id', '[0-9]+');
Route::get('/user/{id}', [App\Http\Controllers\User::class, 'user'])->where('id', '[0-9]+');;
Route::post('/add_comments/{id}', [App\Http\Controllers\Questions::class, 'add_comments'])
    ->where('id', '[0-9]+');
Route::get('/add', [App\Http\Controllers\Questions::class, 'newQuestion'])->name('add');
Route::post('/new-answer', [App\Http\Controllers\Questions::class, 'add'])->name('addQuestion');
Route::get('/questions/{id}', [App\Http\Controllers\Questions::class, 'QuestionsUser'])
    ->where('id', '[0-9]+');
Route::get('/question_delete/{id}', [App\Http\Controllers\Questions::class, 'deleteQuestion'])
    ->where('id', '[0-9]+');

Route::get('/admin', function () {
    if (Auth::user()->permission) {
        return view('user.admin',['users'=>DB::table('users')->get()]);
    };
});
