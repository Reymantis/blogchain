<?php

use App\Http\Controllers\Categories\CategoriesShowController;
use App\Http\Controllers\Pages\HomePageController;
use App\Http\Controllers\Posts\PostsShowController;
use Illuminate\Support\Facades\Route;

request()->server->add(['REMOTE_ADDR' => '148.0.0.1']);

Route::get('/', HomePageController::class)->name('home');
Route::view('/about-us', 'pages.about-us')->name('about-us');
Route::get('articles/{category:slug}/{post:slug}', PostsShowController::class)->name('post.show');
Route::get('/categories/{category:slug}', CategoriesShowController::class)->name('categories.show');
