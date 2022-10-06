<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('home');
Route::prefix('/articles')->name('articles.')->controller(\App\Http\Controllers\Article\ArticleController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'single')->name('single');
});
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('index');
        Route::resource('/articles', ArticleController::class);
    });
    Route::controller(UserController::class)->group(function () {
        Route::middleware('guest')->name('login')->group(function () {
            Route::get('/login', 'loginPage')->name('.page');
            Route::post('/login', 'login');
        });
        Route::middleware('auth')->name('users.')->group(function () {
            Route::get('/logout', 'logout')->name('logout');
        });
    });
});


