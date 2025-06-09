<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class PostsIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Category $category): View
    {
        $category->load('ancestors');

        $posts = $category->posts()
            ->with(['category', 'media', 'user'])
            ->paginate(config('blogchain.pagination.per_page')); // 10 posts per page


        return view('pages.posts.index', [
            'category' => $category,
            'posts' => $posts,
        ]);
    }
}
