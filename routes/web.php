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
Route::get('/dashboard', [App\Http\Controllers\Questions::class, 'all'])->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::get('/question/{id}', [App\Http\Controllers\Questions::class, 'question'])->middleware(['auth', 'verified'])->where
('id', '[0-9]+');
Route::get('/logout', [App\Http\Controllers\User::class, 'logout'])->name('logout')->middleware(['auth']);
Route::get('/account', [App\Http\Controllers\User::class, 'account'])->name('account')->middleware(['auth', 'verified']);
Route::post('/update', [App\Http\Controllers\User::class, 'update'])->name('update_account')->middleware(['auth', 'verified']);
Route::get('/delete/{id}', [App\Http\Controllers\User::class, 'delete'])->middleware(['auth', 'verified'])->where('id', '[0-9]+');
Route::get('/user/{id}', [App\Http\Controllers\User::class, 'user'])->middleware(['auth', 'verified'])->where('id', '[0-9]+');;
Route::post('/add_comments/{id}', [App\Http\Controllers\Questions::class, 'add_comments'])->middleware(['auth', 'verified'])
    ->where('id', '[0-9]+');
Route::get('/add', [App\Http\Controllers\Questions::class, 'newQuestion'])->middleware(['auth', 'verified'])->name('add');
Route::post('/new-answer', [App\Http\Controllers\Questions::class, 'add'])->middleware(['auth', 'verified'])->name('addQuestion');
Route::get('/questions/{id}', [App\Http\Controllers\Questions::class, 'QuestionsUser'])->middleware(['auth', 'verified'])
    ->where('id', '[0-9]+');
Route::get('/question_delete/{id}', [App\Http\Controllers\Questions::class, 'deleteQuestion'])->middleware(['auth', 'verified'])
    ->where('id', '[0-9]+');

Route::get('/admin', function () {
    if (Auth::user()->permission) {
        return view('user.admin',['users'=>DB::table('users')->get()]);
    };
});
