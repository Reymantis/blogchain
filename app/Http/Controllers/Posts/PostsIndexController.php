<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Category;

class PostsIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Category $category)
    {
        $category->load('ancestors');

        $posts = $category->posts()
            ->with(['category', 'media', 'user', 'visits'])
            ->paginate(config('blogchain.pagination.per_page')); // 10 posts per page
    
        return view('pages.posts.index', [
            'category' => $category,
            'posts' => $posts,
        ]);
    }
}
