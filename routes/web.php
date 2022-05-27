<?php

use App\Http\Controllers\ArticalController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [ArticalController::class, 'index']);
Route::get('/articals', [ArticalController::class, 'index']);

Route::get('/articals/detail/{id}', [ArticalController::class, 'detail']);

Route::get('/articals/add', [ArticalController::class, 'add'])->middleware('auth');
Route::post('/articals/add', [ArticalController::class, 'create'])->middleware('auth');
Route::get('/articals/edit/{id}', [ArticalController::class, 'edit'])->middleware('auth');
Route::patch('/articals/update/{id}', [ArticalController::class, 'update'])->middleware('auth');
Route::delete('/articals/delete/{id}', [ArticalController::class, 'delete'])->middleware('auth');

// Comment 
Route::post('/comments/add', [CommentController::class, 'add'])->middleware('auth');
Route::get('/comments/delete/{id}', [CommentController::class, 'delete'])->middleware('auth');


Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

