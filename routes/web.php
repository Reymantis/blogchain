<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\Pages\HomePageController::class)->name('home');
Route::view('/about-us', 'pages.about-us')->name('about-us');
Route::get('{category:slug}/{post:slug}', \App\Http\Controllers\Posts\PostsShowController::class)->name('post.show');


//Route::post('/posts/{post}/likes', function(Post $post) {
//    $post->addLike(auth()->user());
//    return back();
//})->name('post.likes.store');
//
//Route::delete('/posts/{post}/likes', function(Post $post) {
//    $post->removeLike(auth()->user());
//    return back();
//})->name('post.likes.destroy');
