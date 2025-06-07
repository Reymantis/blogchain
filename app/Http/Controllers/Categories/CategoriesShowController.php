<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class CategoriesShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Category $category)
    {
        $category
            ->load(['children', 'ancestors', 'media'])
            ->loadCount(['children', 'posts']);


        return view('pages.categories.show', [
            'category' => $category,
        ]);
    }
}
