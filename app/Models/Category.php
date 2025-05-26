<?php

namespace App\Models;

use App\Helpers\MediaConversion;
use App\Traits\Live;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;
    use Live;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'color',
        'live'
    ];

    protected $casts = [
        'live' => 'boolean'
    ];

    private MediaConversion $mediaConversion;

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->mediaConversion = new MediaConversion($this, 'categories');
    }

    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this->mediaConversion->registerMediaCollections();
    }


}
