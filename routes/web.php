<?php

use App\Http\Controllers\MediaController;
use App\Http\Controllers\pageControlle;
use App\Http\Controllers\postController;
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


Route::get('/', [pageControlle::class ,'index']);
Route::get('/about', [pageControlle::class ,'about']);
Route::get('/features', [pageControlle::class ,'features']);

Route::resource('post', postController::class);

Route::get('/media', [MediaController::class ,'index'] );
Route::post('/media', [MediaController::class ,'store'] );
Route::delete('/media/{id}', [MediaController::class ,'destroy'] );
Route::get('/media/upload', [MediaController::class ,'create'] );
Route::get('/media/{id}', [MediaController::class ,'show'] );




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
