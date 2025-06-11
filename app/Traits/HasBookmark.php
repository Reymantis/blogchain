<?php

namespace App\Traits;

use App\Models\Bookmark;

trait HasBookmark
{
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
