<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
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

Route::middleware(['auth:sanctum','verified'])->resource('users', UserController::class);
Route::middleware(['auth:sanctum','verified'])->resource('articles', ArticleController::class);
Route::middleware(['auth:sanctum','verified'])->get('users/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy');



//Route::middleware(['auth:sanctum','verified'])->get('users/index', [UserController::class, 'index'])->name('users.index');
//Route::middleware(['auth:sanctum','verified'])->get('users/show', [UserController::class, 'show'])->name('users.show');
//Route::middleware(['auth:sanctum','verified'])->get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
//Route::middleware(['auth:sanctum','verified'])->put('users/{user}', [UserController::class, 'update'])->name('users.update');

Route::middleware(['auth:sanctum','verified'])->resource('tags', TagController::class);


Route::middleware(['auth:sanctum','verified'])->post('tags/store', [TagController::class,'store']);

