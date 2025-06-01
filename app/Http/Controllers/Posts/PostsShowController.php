<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\View\View;

class PostsShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Category $category, Post $post): View
    {
        if (config('blogchain.enable_page_views')) {
            $post->logView();
        }
        $post->load('user', 'media', 'tags');
        return view('pages.posts.show', compact('category', 'post'));
    }
}
