<?php

namespace App\Helpers;

use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaConversion
{
    private HasMedia $model;
    private string $collection;

    public function __construct(HasMedia $model, string $collection = 'default')
    {
        $this->model = $model;
        $this->collection = $collection;
    }

    public function registerMediaCollections(): void
    {
        $this->model
            ->addMediaCollection($this->collection)
            ->useFallbackUrl('https://placehold.co/600x400')
            ->useFallbackUrl('https://placehold.co/600x400', 'card')
            ->useFallbackUrl('https://placehold.co/1200x800', 'main')
            ->registerMediaConversions(function (Media $media) {
                $this->model
                    ->addMediaConversion('thumbnail')
                    ->fit(Fit::Crop, 100, 100)
                    ->crop(100, 100, CropPosition::Center)
                    ->width(100)
                    ->height(100)
                    ->format('webp');

                $this->model
                    ->addMediaConversion('card')
                    ->fit(Fit::Crop, 300, 200)
                    ->crop(300, 200, CropPosition::Center)
                    ->width(300)
                    ->height(200)
                    ->format('webp');

                $this->model
                    ->addMediaConversion('main')
                    ->fit(Fit::Crop, 1200, 800)
                    ->crop(1200, 800, CropPosition::Center)
                    ->width(1200)
                    ->height(800)
                    ->format('webp');
            });
    }
}
