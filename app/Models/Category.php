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
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    /** @use HasFactory<CategoryFactory> */
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;
    use Live;
    use NodeTrait;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'color',
        'live',
        'parent_id'
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
