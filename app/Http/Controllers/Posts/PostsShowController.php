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
        $post->visit();
        // Load user with posts count
        $post->load([
            'user' => function ($query) {
                $query->withCount('posts');
            },
            'media',
            'tags',
        ]);

        return view('pages.posts.show', compact('category', 'post'));
    }
}
