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
    public function __invoke(Category $category): View
    {
        $category->load(['children', 'ancestors']);
        $category->loadCount(['children', 'posts']);

//        $category->load([
//            'children' => function ($query) {
//                $query->withCount('children');
//            },
//            'parent' => function ($query) {
//                $query->withCount(['children', 'posts']);
//            }
//        ]);

        return view('pages.categories.show', [
            'category' => $category,
        ]);
    }
}
