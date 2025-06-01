<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

request()->server->add(['REMOTE_ADDR' => '148.0.0.1']);

Route::get('/', \App\Http\Controllers\Pages\HomePageController::class)->name('home');
Route::view('/about-us', 'pages.about-us')->name('about-us');
Route::get('articles/{category:slug}/{post:slug}', \App\Http\Controllers\Posts\PostsShowController::class)->name('post.show');
