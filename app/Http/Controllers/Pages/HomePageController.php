<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\View\View;

class HomePageController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        $posts = Post::with('user', 'media', 'category')->orderBy('view_count', 'desc')->paginate(12);
        return view('pages.home', compact('posts'));
    }
}
