<?php

use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
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

// Main Page
Route::get('/', [PostController::class, 'index'])->name('home');

//Post Page
Route::get('post/{post:slug}', [PostController::class, 'show']);

//Store Comment
Route::post('post/{post:slug}/comment', [PostCommentController::class, 'store'])->middleware('auth');

//Register Page
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

//Register User
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

//Login Page
Route::get('login', [SessionController::class, 'create'])->middleware('guest');
//Login User
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
//Logout User
Route::post('logout', [SessionController::class, 'destory'])->middleware('auth');


Route::get('admin/post/create', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/post', [PostController::class, 'store'])->middleware('admin');
