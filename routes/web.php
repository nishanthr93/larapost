<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostlikesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Google login
Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/google/callback', [LoginController::class, 'handleGoogleCallback']);


Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/posts',[PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');
Route::post('/posts',[PostController::class, 'store']);
Route::delete('/posts/{post}/delete',[PostController::class, 'destroy'])->name('posts.delete');

Route::post('/posts/{post}/likes',[PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes',[PostLikeController::class, 'destroy'])->name('posts.likes');

Route::get('/user/{user:username}/posts', [UserPostController::class, 'index'])->name('user.posts');

Route::get('/comments/{post}',[PostCommentController::class, 'index'])->name('comments');
Route::post('/comments/{post}',[PostCommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{post}/delete',[PostCommentController::class, 'destroy'])->name('comments.delete');

Route::get('/clear', function () {
    Storage::deleteDirectory('public');
    Storage::makeDirectory('public');

    Artisan::call('route:clear');
    Artisan::call('storage:link', [] );
});
