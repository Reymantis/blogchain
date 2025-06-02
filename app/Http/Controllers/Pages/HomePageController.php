<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;
use Spatie\Tags\Tag;

class HomePageController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        $tags = Tag::get()->take(100);
        $posts = Post::with('user', 'media', 'category')->orderBy('view_count', 'desc')->paginate(12);
        return view('pages.home', compact('posts', 'tags'));
    }
}
