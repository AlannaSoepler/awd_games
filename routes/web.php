<?php

use Illuminate\Support\Facades\Route;
//Tell laravel where to find the PageController
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
//Controller for role of user to view surtant pages. 
//Gives the alias UserGameController
use App\Http\Controllers\User\GameController as UserGameController;
//If i don't add the as, i will get the error that GameController has allready been defined
use App\Http\Controllers\Admin\GameController as AdminGameController;




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

//Authentication roots 

Auth::routes();
//Structure: URL /home, to get to this page. Then get the index function within HomeController class. Name this home
//Here it will default send the user to the home page and then, in the index function, it will redirected the user to eith admin.home or user.home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[PageController::class, 'welcome'])->name('welcome');
Route::get('/about',[PageController::class, 'about'])->name('about');
Route::get('/admin/home',[App\Http\Controllers\Admin\HomeController::class,'index'])->name('admin.home');
//All users will be able to view these 
Route::get('/user/home',[App\Http\Controllers\User\HomeController::class,'index'])->name('user.home');
//Routes to the function that will shows all the games
Route::get('/user/games/', [UserGameController::class, 'index'])->name('user.games.index');
//Routes to the function that will shows the game with that id
Route::get('/user/games/{id}', [UserGameController::class, 'show'])->name('user.games.show');
//The admin will be able to view these 
//Routes to the function that will view all the games
Route::get('/admin/games/', [AdminGameController::class, 'index'])->name('admin.games.index');
//The id is what has been passed in
//Routes to the function that will show the game with the same id
Route::get('/admin/games/{id}', [AdminGameController::class, 'show'])->name('admin.games.show');
//Routes to the function that will create a game
Route::get('/admin/games/create', [AdminGameController::class, 'create'])->name('admin.games.create');
//Has a post method
//Routes to the function that will store the new game that has been created
Route::post('/admin/games/store', [AdminGameController::class, 'store'])->name('admin.games.store');
//Routes to the function that will Edit the game that allready exists 
Route::get('/admin/games/{id}/edit', [AdminGameController::class, 'edit'])->name('admin.games.edit');
//Routes to the function that Will be called to store the newly edited game
Route::put('/admin/games/{id}', [AdminGameController::class, 'update'])->name('admin.games.update');
//Routes to the function that will delete a game 
Route::delete('/admin/games/{id}', [AdminGameController::class, 'destroy'])->name('admin.games.destroy');