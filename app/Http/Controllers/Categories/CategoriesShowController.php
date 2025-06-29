<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CategoriesShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Category $category)
    {
        $cat = $category->loadCount('children')->load('children');
        $descendantIds = $cat->descendants()->pluck('id')->push($cat->id);
        $userId = Auth::id();

        $with = [
            'media',
            'tags',
            'category',
            'user',
        ];
        if ($userId) {
            $with['likes'] = function ($q) use ($userId) {
                $q->where('user_id', $userId);
            };
        }

        $posts = Post::whereIn('category_id', $descendantIds)
            ->with($with)
            ->withCount([
                'likes as like_count' => function ($q) {
                    $q->where('like_type', 'like');
                },
            ])
            ->latest()
            ->paginate(10);

        return view('pages.categories.show', [
            'category' => $cat,
            'posts' => $posts,
        ]);
    }
}
