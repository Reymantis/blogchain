<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomePageController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        $posts = Post::with('user', 'category', 'tags', 'media')->paginate(16);
        return view('pages.home', compact('posts'));
    }
}
