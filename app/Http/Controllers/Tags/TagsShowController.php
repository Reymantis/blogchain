<?php

namespace App\Http\Controllers\Tags;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Tags\Tag;

class TagsShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Tag $tag)
    {

        $posts = Post::with('category', 'media', 'user')->withAnyTags([$tag], 'posts')->latest()->paginate(16);

        return view('pages.tags.show', [
            'tag' => $tag,
            'posts' => $posts,
        ]);
    }
}
