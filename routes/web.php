<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post');
Route::get('/editar_post/{post}', [PostController::class, 'editar_post'])->name('editar.post')->middleware('admin');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
Route::get('/posts', [PostsController::class, 'index'])->name('posts');
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::get('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy')->middleware('client');
Route::get('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy')->middleware('client');
Route::post('/comment', [CommentController::class, 'store'])->name('comment')->middleware('client');
Route::get('/postagem', [PostController::class, 'postagem'])->name('postagem')->middleware('admin');
Route::post('/postagem', [PostController::class, 'store'])->name('postagem')->middleware('admin');
Route::put('/atualizar_post/{post}', [PostController::class, 'atualizar'])->name('atualizar.post')->middleware('admin');
Route::get('/404', [HomeController::class, 'error'])->name('404');
