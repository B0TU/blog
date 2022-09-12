<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\CategoriesController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('pages/{page:slug}', [PagesController::class, 'show'])->name('pages.show');

Route::get('categories/{category:slug}', [CategoriesController::class, 'show'])->name('categories.show');

Route::get('posts/{post:slug}', [PostsController::class, 'show'])->name('posts.show');

Route::get('author/{author:name}', [AuthorsController::class, 'show'])->name('authors.show');