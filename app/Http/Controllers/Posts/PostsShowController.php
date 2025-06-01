<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostsShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Category $category, Post $post): View
    {
        $post->logView();
        $post->load('user', 'media', 'tags');
        return view('pages.posts.show', compact('category', 'post'));
    }
}
