<?php

namespace App\Models;

use App\Helpers\MediaConversion;
use App\Traits\HasMediaConversions;
use App\Traits\Live;
use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;

class Post extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    use SoftDeletes;
    use HasTags;
    use InteractsWithMedia;
    use Likeable;
    use Live;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'description',
        'live',
        'category_id',
        'user_id',
    ];

    protected $casts = [
        'live' => 'boolean',
        'category_id' => 'integer',
        'user_id' => 'integer',
    ];
    private MediaConversion $mediaConversion;

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->mediaConversion = new MediaConversion($this, 'posts');
    }

    public function estimatedReadTime($wpm = 200): float
    {
        $wordCount = str_word_count(strip_tags($this->content));
        return ceil($wordCount / $wpm);
    }


    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this->mediaConversion->registerMediaCollections();
    }


}
