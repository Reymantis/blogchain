<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HomePageController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        $posts = Cache::remember('front-page.posts', config('cache.time_to_live'), fn() => Post::with('user', 'media', 'category')
//            ->orderBy('view_count','asc')
            ->latest()
            ->get()->take(6));
        return view('pages.home', compact('posts'));
    }
}
