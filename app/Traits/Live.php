<?php

namespace App\Traits;

trait Live
{
    public function scopeLive($query, $field = 'live')
    {
        return $query->where($field, true);
    }
}
