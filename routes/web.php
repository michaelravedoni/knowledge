<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;

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
    return view('welcome');
})->name('home');
Route::get('/', HomeController::class)->name('home');

Route::get('/hc', [ArticleController::class, 'index'])->name('hc');
Route::get('/hc/search', [ArticleController::class, 'search'])->name('hc.search');
Route::get('/hc/{project}', [ArticleController::class, 'showProject'])->name('hc.project');
Route::get('/hc/{project}/{article}-{slug?}', [ArticleController::class, 'show'])->name('hc.article');
