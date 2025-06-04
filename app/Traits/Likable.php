<?php

namespace App\Traits;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;
use RuntimeException;

trait Likable
{
    protected static function bootLikable(): void
    {
        static::deleted(function (Model $model) {
            try {
                Redis::del($model->getLikesKey());
            } catch (Exception $e) {
                report($e);
            }
        });
    }

    protected function getLikesKey(): string
    {
        if (!$this instanceof Model) {
            throw new RuntimeException('This trait can only be used on Eloquent models');
        }

        return config('app.name') . ':'
            . $this->getTable() . ':'
            . $this->getKey() . ':likes';
    }

    public function addLike(User $user): void
    {
        try {
            Redis::sadd($this->getLikesKey(), $user->id);
        } catch (Exception $e) {
            report($e); // Log the exception
            throw new RuntimeException('Failed to add like');
        }
    }

    public function removeLike(User $user): void
    {
        try {
            Redis::srem($this->getLikesKey(), $user->id);
        } catch (Exception $e) {
            report($e);
            throw new RuntimeException('Failed to remove like');
        }
    }

    public function getLikeCount(): int
    {
        try {
            return Redis::scard($this->getLikesKey()) ?: 0;
        } catch (Exception $e) {
            report($e);
            return 0;
        }
    }

    public function likedBy(User $user): bool
    {
        try {
            return (bool)Redis::sismember($this->getLikesKey(), $user->id);
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function getLikers(): array
    {
        try {
            return Redis::smembers($this->getLikesKey()) ?: [];
        } catch (Exception $e) {
            report($e);
            return [];
        }
    }
}
