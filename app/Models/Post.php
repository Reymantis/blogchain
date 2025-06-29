<?php

namespace App\Models;

use App\Traits\Likeable;
use App\Traits\Live;
use App\Traits\LogsViews;
use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;

class Post extends Model implements CanVisit, HasMedia
{
    /** @use HasFactory<PostFactory> */
    use HasFactory;

    use HasTags;
    use HasVisits;
    use InteractsWithMedia;
    use Likeable;
    use Live;
    use LogsViews;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'description',
        'disclaimer',
        'live',
        'category_id',
        'user_id',
        'view_count',
        'youtube_url',
        'approved_at',
        'created_at',
    ];

    protected $casts = [
        'live' => 'boolean',
        'category_id' => 'integer',
        'user_id' => 'integer',
    ];

    protected $appends = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('posts')
            ->useFallbackUrl('https://placehold.co/600x400')
            ->useFallbackUrl('https://placehold.co/600x400', 'card')
            ->useFallbackUrl('https://placehold.co/1200x800', 'main')
            ->singleFile()
            ->registerMediaConversions(function (?Media $media) {
                foreach (config('media-conversion.default') as $key => $image) {
                    $this->addMediaConversion($key)
                        ->format($image['format'])
                        ->fit(Fit::Max, $image['width'], $image['height'])
//                       ->fit(Fit::Crop, $image['width'], $image['height'])
                        ->nonQueued()
                        ->crop($image['width'], $image['height'], CropPosition::Center)
                        ->width($image['width'])
                        ->height($image['height'])
                        ->format($image['format']);
                }
            });
    }

    public function estimatedReadTime(): Attribute
    {
        return Attribute::get(function () {
            if (empty($this->content)) {
                return null;
            }

            $wpm = 200;
            $wordCount = str_word_count(strip_tags($this->content));

            return ceil($wordCount / $wpm);
        });
    }
}
