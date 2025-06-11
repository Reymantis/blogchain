<?php

namespace App\Models;

use Database\Factories\BookmarkFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Bookmark extends Model
{
    /** @use HasFactory<BookmarkFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'bookmarkable_id', 'bookmarkable_type'];

    public function bookmarkable(): MorphTo
    {
        return $this->morphTo();
    }
}
