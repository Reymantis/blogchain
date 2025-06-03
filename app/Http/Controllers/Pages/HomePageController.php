<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\ActiveUsers;
use Spatie\Tags\Tag;

class HomePageController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $usersActive = ActiveUsers::get();
//        $totalTagsCount = Tag::count();
        $tags = Tag::get()->take(30);
        $posts = Post::with('user', 'media', 'category')->orderBy('view_count', 'desc')->get()->take(6);
        return view('pages.home', compact('posts', 'tags', 'usersActive'));
    }
}
