<?php

namespace App\Traits;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Likeable
{
    /**
     * Toggle like/unlike for user
     */
    public function toggleLike($user, string $type = Like::TYPE_LIKE): string
    {
        if ($this->likedBy($user, $type)) {
            $this->removeLike($user, $type);
            return 'unliked';
        } else {
            $this->addLike($user, $type);
            return 'liked';
        }
    }

    /**
     * Check if user already liked this model
     */
    public function likedBy($user, string $type = Like::TYPE_LIKE): bool
    {
        $userId = $user instanceof User ? $user->id : $user;

        return $this->likes()
            ->where('user_id', $userId)
            ->where('like_type', $type)
            ->exists();
    }

    /**
     * Get all likes for this model
     */
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    /**
     * Remove a like from user
     */
    public function removeLike($user, string $type = Like::TYPE_LIKE): int
    {
        $userId = $user instanceof User ? $user->id : $user;

        return $this->likes()
            ->where('user_id', $userId)
            ->where('like_type', $type)
            ->delete();
    }

    /**
     * Add a like from user
     */
    public function addLike($user, string $type = Like::TYPE_LIKE): bool|Like
    {
        $userId = $user instanceof User ? $user->id : $user;

        // Check if already liked
        if ($this->likedBy($user, $type)) {
            return false; // Already liked
        }

        return $this->likes()->create([
            'user_id' => $userId,
            'like_type' => $type
        ]);
    }

    /**
     * Get like count for specific type
     */
    public function getLikeCount(string $type = Like::TYPE_LIKE): int
    {
        return $this->likes()->ofType($type)->count();
    }

    /**
     * Get total likes count (all types)
     */
    public function getTotalLikesAttribute(): int
    {
        return $this->likes()->count();
    }

    /**
     * Get all likes with user information
     */
    public function getLikesWithUsers(string $type = null): Collection
    {
        $query = $this->likes()->with('user');

        if ($type) {
            $query->ofType($type);
        }

        return $query->get();
    }

    /**
     * Get users who liked this model
     */
    public function likedByUsers(string $type = Like::TYPE_LIKE)
    {
        return User::whereIn('id',
            $this->likes()->ofType($type)->pluck('user_id')
        );
    }

    /**
     * Check if model has any likes
     */
    public function hasLikes(): bool
    {
        return $this->likes()->exists();
    }

    /**
     * Check if model has likes of specific type
     */
    public function hasLikesOfType(string $type): bool
    {
        return $this->likesOfType($type)->exists();
    }

    /**
     * Get likes of a specific type
     */
    public function likesOfType(string $type = Like::TYPE_LIKE): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable')->ofType($type);
    }

    /**
     * Get most popular like type for this model
     */
    public function getMostPopularLikeType(): ?string
    {
        $counts = $this->getLikesCountByTypes();

        if (empty($counts)) {
            return null;
        }

        return array_key_first((array)array_slice(arsort($counts), 0, 1, true));
    }

    /**
     * Get likes count grouped by type
     */
    public function getLikesCountByTypes(): array
    {
        return $this->likes()
            ->selectRaw('like_type, count(*) as count')
            ->groupBy('like_type')
            ->pluck('count', 'like_type')
            ->toArray();
    }
}
