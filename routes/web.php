<?php

use App\Http\Controllers\Categories\CategoriesShowController;
use App\Http\Controllers\Pages\HomePageController;
use App\Http\Controllers\Posts\PostsIndexController;
use App\Http\Controllers\Posts\PostsShowController;
use Illuminate\Support\Facades\Route;

request()->server->add(['REMOTE_ADDR' => '148.0.0.1']);

Route::get('/', HomePageController::class)->name('home');
Route::view('/about-us', 'pages.about-us')->name('about-us');
Route::get('/categories/{category:slug}', CategoriesShowController::class)->name('categories.show');
Route::get('/articles/{category:slug}', PostsIndexController::class)->name('posts.index');
Route::get('/article/{category:slug}/{post:slug}', PostsShowController::class)->name('posts.show');
