<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function creating(Post $post): void
    {
        $post->slug = Str::slug($post->title);
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updating(Post $post): void
    {
        $post->slug = Str::slug($post->title);
    }
}
