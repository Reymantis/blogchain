<?php

namespace App\Helpers;

class Keywords
{
    /**
     * Convert keywords to a comma-separated string.
     */
    public static function toString(array|string|null $keywords): string
    {
        return implode(', ', self::toArray($keywords));
    }

    /**
     * Convert keywords to an array, trimming each entry.
     */
    public static function toArray(array|string|null $keywords): array
    {
        if (is_string($keywords)) {
            return array_map('trim', explode(',', $keywords));
        }

        if (is_array($keywords)) {
            return array_map('trim', $keywords);
        }

        return [];
    }
}
