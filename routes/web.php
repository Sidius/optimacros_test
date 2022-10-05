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

Route::get('/', [\App\Http\Controllers\MainController::class, 'index']);
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('index');
    Route::controller(\App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::middleware('guest')->name('login')->group(function () {
            Route::get('/login', 'loginPage')->name('.page');
            Route::post('/login', 'login');
        });
        Route::middleware('auth')->name('users.')->group(function () {
            Route::get('/logout', 'logout')->name('logout');
        });
    });
});


