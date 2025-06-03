```php
<?php

namespace App\Models;

use App\Helpers\MediaConversion;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['title', 'content'];

    public function registerMediaCollections(): void
    {
        // Basic usage with defaults (single file)
        (new MediaConversion($this, 'featured_image'))
            ->registerMediaCollections();

        // Allow multiple files with custom fallback URLs
        (new MediaConversion($this, 'gallery'))
            ->allowMultiple()
            ->setFallbackUrl('https://via.placeholder.com/800x600', 'default')
            ->setFallbackUrl('https://via.placeholder.com/400x300', 'card')
            ->registerMediaCollections();

        // Custom configuration with additional conversions
        (new MediaConversion($this, 'attachments'))
            ->allowMultiple()
            ->addConversion('small', [
                'width' => 150,
                'height' => 150,
                'fit' => Fit::Contain,
                'quality' => 80
            ])
            ->removeConversion('main') // Remove the main conversion
            ->updateConversion('card', ['width' => 400, 'height' => 300])
            ->registerMediaCollections();

        // Using constructor with config array
        new MediaConversion($this, 'documents', [
            'single_file' => false,
            'fallback_urls' => [
                'default' => 'https://via.placeholder.com/500x500',
                'thumbnail' => 'https://via.placeholder.com/100x100',
            ],
            'conversions' => [
                'thumbnail' => [
                    'width' => 80,
                    'height' => 80,
                    'fit' => Fit::Crop,
                    'crop_position' => CropPosition::Top,
                    'quality' => 90
                ],
                'preview' => [
                    'width' => 500,
                    'height' => 500,
                    'fit' => Fit::Contain,
                    'format' => 'webp'
                ]
            ]
        ])->registerMediaCollections();
    }

    // Helper methods for accessing media
    public function getFeaturedImageAttribute()
    {
        return $this->getFirstMediaUrl('featured_image');
    }

    public function getFeaturedImageThumbnailAttribute()
    {
        return $this->getFirstMediaUrl('featured_image', 'thumbnail');
    }

    public function getGalleryImagesAttribute()
    {
        return $this->getMedia('gallery');
    }
}
```
