<?php

use App\Http\Controllers\Categories\CategoriesShowController;
use App\Http\Controllers\Pages\HomePageController;
use App\Http\Controllers\Posts\PostsIndexController;
use App\Http\Controllers\Posts\PostsShowController;
use App\Http\Controllers\Tags\TagsShowController;
use App\Http\Controllers\Users\UsersIndexController;
use App\Http\Controllers\Users\UsersShowController;
use Illuminate\Support\Facades\Route;

//request()->server->add(['REMOTE_ADDR' => '148.0.0.1']);


Route::get('/', HomePageController::class)->name('home');


Route::view('/about-us', 'pages.about-us')->name('about-us');
Route::view('/contact-us', 'pages.contact-us')->name('contact-us');

Route::get('/contributors', UsersIndexController::class)->name('users.index');
Route::get('/contributors/{user}', UsersShowController::class)->name('users.show');

Route::get('/categories/{category:slug}', CategoriesShowController::class)->name('categories.show');
Route::get('/articles/{category:slug}', PostsIndexController::class)->name('posts.index');

Route::get('/article/{category:slug}/{post:slug}', PostsShowController::class)->name('posts.show');
Route::get('/tags/{tag}', TagsShowController::class)->name('tags.show');
