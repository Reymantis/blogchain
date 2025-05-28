<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\Pages\HomePageController::class)->name('home');

Route::get('{category:slug}/{post:slug}', \App\Http\Controllers\Posts\PostsShowController::class)->name('post.show');
