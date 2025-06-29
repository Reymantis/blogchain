<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Like extends Model
{
    use HasFactory;

    const TYPE_LIKE = 'like';

    // Define like types as constants
    const TYPE_LOVE = 'love';

    const TYPE_DISLIKE = 'dislike';

    const TYPE_ANGRY = 'angry';

    const TYPE_LAUGH = 'laugh';

    const TYPE_SAD = 'sad';

    const TYPE_WOW = 'wow';

    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type',
        'like_type',
    ];

    /**
     * Get all available like types
     */
    public static function getAvailableTypes(): array
    {
        return [
            self::TYPE_LIKE,
            self::TYPE_LOVE,
            self::TYPE_DISLIKE,
            self::TYPE_ANGRY,
            self::TYPE_LAUGH,
            self::TYPE_SAD,
            self::TYPE_WOW,
        ];
    }

    /**
     * Get the user who created the like
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class);
    }

    /**
     * Get the likeable model (polymorphic)
     */
    public function likeable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Scope to filter by like type
     */
    public function scopeOfType($query, string $type)
    {
        return $query->where('like_type', $type);
    }

    /**
     * Scope to filter by user
     */
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope to filter by likeable model
     */
    public function scopeForModel($query, $model)
    {
        return $query->where('likeable_type', get_class($model))
            ->where('likeable_id', $model->id);
    }
}
