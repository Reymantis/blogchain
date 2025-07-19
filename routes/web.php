<?php

use App\Http\Controllers\Categories\CategoriesShowController;
use App\Http\Controllers\Pages\HomePageController;
use App\Http\Controllers\Pages\MarkdownPagesController;
use App\Http\Controllers\Posts\PostsIndexController;
use App\Http\Controllers\Posts\PostsShowController;
use App\Http\Controllers\Quiz\QuizCategoryController;
use App\Http\Controllers\Quiz\QuizIndexController;
use App\Http\Controllers\Quiz\QuizShowController;
use App\Http\Controllers\Tags\TagsShowController;
use App\Http\Controllers\Users\UsersIndexController;
use App\Http\Controllers\Users\UsersShowController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePageController::class)->name('home');

Route::get('/about-us', [MarkdownPagesController::class, 'about_us'])->name('about-us');
Route::get('/legal/privacy-policy', [MarkdownPagesController::class, 'privacy_policy'])->name('privacy-policy');

Route::view('/contact-us', 'pages.contact-us')->name('contact-us');

Route::get('/contributors', UsersIndexController::class)->name('users.index');
Route::get('/contributors/{user}', UsersShowController::class)->name('users.show');

Route::get('/categories/{category:slug}', CategoriesShowController::class)->name('categories.show');
Route::get('/articles/{category:slug}', PostsIndexController::class)->name('posts.index');

Route::get('/article/{category:slug}/{post:slug}', PostsShowController::class)->name('posts.show');
Route::get('/tags/{tag}', TagsShowController::class)->name('tags.show');

Route::view('/games/wordle', 'pages.games.wordle')->name('games.wordle');

Route::get('/learn', QuizCategoryController::class)->name('quiz-category.index');
Route::get('/learn/{category}', QuizIndexController::class)->name('quiz.index');
Route::get('/quiz/{quiz}', QuizShowController::class)->name('quiz.show');
// Route::get('/quiz/results/{attempt}', QuizResultsController::class)->name('quiz.results');
