<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/pages', [App\Http\Controllers\PostlistController::class, 'index']);
Route::middleware(['auth'])->group(function () {
    Route::get('user/edit', 'UserController@edit')->name('user.edit');
    Route::put('user/update', 'UserController@update')->name('user.update');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::patch('user/{user}/toggle_activation', 'UserController@toggleActivation')->name('user.toggle_activation');
});

Route::middleware(['auth'])->group(function () {
    Route::get('admin/settings', [App\Http\Controllers\ProfileController::class, 'settings']);
});

