<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleHistoryVersionController;
use App\Http\Controllers\FileSystemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkManController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/admin', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


// 后台
Route::middleware(['auth:sanctum','verified'])->prefix('admin')->group(function () {

    Route::resource('users', UserController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('article-history-version', ArticleHistoryVersionController::class);
    Route::get('users/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('articles/{article}/destroy', [ArticleController::class, 'destroy'])->name('articles.destroy');
    Route::post('file-system/upload-image', [FileSystemController::class, 'uploadImage'])->name('file-system.upload-image');
    Route::resource('tags', TagController::class);
    Route::post('tags/store', [TagController::class,'store']);

});


// 前台
Route::middleware(['auth:sanctum','verified'])->prefix('/')->group(function () {

    Route::get('',[HomeController::class,'index'])->name('home.index');

});
