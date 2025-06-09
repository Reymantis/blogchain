<?php

namespace App\Http\Controllers\Tags;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Spatie\Tags\Tag;

class TagsShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Tag $tag)
    {

        $posts = Post::with('category', 'media', 'user')->withAnyTags([$tag], 'posts')->latest()->paginate(config('blogchain.pagination.per_page'));

        return view('pages.tags.show', [
            'tag' => $tag,
            'posts' => $posts,
        ]);
    }
}
