<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\View\View;

class CategoriesShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Category $category)
    {
        $cat = $category
            ->loadCount(['children']);


        $posts =  Post::whereIn('category_id', $cat->descendants()->pluck('id'))
            ->with(['media', 'tags'])
            ->latest()
            ->paginate(10);

        return view('pages.categories.show', [
            'category' => $category,
            'posts' => $posts,
        ]);
    }
}
