<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Redis;

trait Likable
{

    public function addlike(User $user): void
    {
        Redis::sadd($this->getLikesKey(), $user->id);
    }

    public function removelike(User $user): void
    {
        Redis::srem($this->getLikesKey(), $user->id);
    }

    public function getLikeCount(): int
    {
        return Redis::scard($this->getLikesKey());
    }

    public function likedBy(User $user): bool
    {
        return Redis::sismember($this->getLikesKey(), $user->id);
    }

    protected function getLikesKey(): string
    {
        return sprintf('%s.%s.likes', $this->getTable(), $this->id);
    }


}
