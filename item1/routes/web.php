<?php

use App\Http\Controllers\UserController;
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

Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index')->name('user.index');
    Route::get('/user/novo', 'create')->name('user.create');
    Route::post('/user', 'store')->name('user.store');
    Route::get('/user/{user}/edit', 'edit')->name('user.edit');
    Route::put('/user/{user}', 'update')->name('user.update');
    Route::delete('/user/{user}', 'delete')->name('user.destroy');
});