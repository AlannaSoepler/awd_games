<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\GameController as UserGameController;




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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[PageController::class, 'welcome'])->name('welcome');
Route::get('/about',[PageController::class, 'about'])->name('about');
Route::get('/admin/home',[App\Http\Controllers\Admin\HomeController::class,'index'])->name('admin.home');
Route::get('/user/home',[App\Http\Controllers\User\HomeController::class,'index'])->name('user.home');
Route::get('/user/games/', [UserGameController::class, 'index'])->name('user.games.index');
Route::get('/user/games/{id}', [UserGameController::class, 'show'])->name('user.games.show');
