<?php

use App\Models\Article;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', function(){
  return inertia('Home');
});

Route::get('/articles', [MainController::class, 'index']);
Route::get('/articles/{article:slug}', [MainController::class, 'show']);
Route::get('/categories', [MainController::class, 'categories']);
Route::get('/categories/{category}', [MainController::class, 'showCategory']);

Route::middleware(['guest'])->group(function(){
  Route::get('/login', [LoginController::class, 'login'])->name('login');
  Route::post('/login', [LoginController::class, 'authenticate']);
  Route::get('/register', [RegisterController::class, 'register']);
  Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware(['auth'])->group(function(){
  Route::get('/logout', [LoginController::class, 'logout']);

  Route::prefix('/admin')->group(function(){
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('articles', ArticleController::class);
    Route::post('/checkSlug', [ArticleController::class, 'checkSlug']);
  });
});
