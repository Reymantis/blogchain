<?php

namespace App\Models;

use App\Helpers\MediaConversion;
use App\Traits\Live;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model implements HasMedia
{
    /** @use HasFactory<CategoryFactory> */
    use HasFactory;

    use InteractsWithMedia;
    use Live;
    use NodeTrait;
    use SoftDeletes;
    use SortableTrait;

    public array $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'color',
        'live',
        'parent_id',
        'order_column',
    ];

    protected $casts = [
        'live' => 'boolean',
    ];

    private MediaConversion $mediaConversion;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->mediaConversion = new MediaConversion($this, 'categories');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('categories')
            ->useFallbackUrl('https://placehold.co/600x400')
            ->useFallbackUrl('https://placehold.co/600x400', 'card')
            ->useFallbackUrl('https://placehold.co/1200x800', 'main')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
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
}
