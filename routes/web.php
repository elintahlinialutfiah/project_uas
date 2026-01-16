<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ================== HALAMAN PUBLIK ==================
Route::get('/', [ArticleController::class, 'publicIndex']);
Route::get('/artikel/{article}', [ArticleController::class, 'show']);

// ================== LOGIN ==================
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

// ================== ADMIN (WAJIB LOGIN) ==================
Route::middleware('auth')->prefix('admin')->group(function () {
Route::resource('articles', ArticleController::class);
Route::view('/tentang', 'about')->name('about');
});
