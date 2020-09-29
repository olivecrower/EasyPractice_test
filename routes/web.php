<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MoviesController;

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

Route::get('/', [MoviesController::class, 'index']);
Route::post('/movies', [MoviesController::class, 'addMovie']);
Route::put('/movies/{id}/watched', [MoviesController::class, 'haveWatchedMovie']);
Route::delete('/movies/{id}', [MoviesController::class, 'deleteMovie']);