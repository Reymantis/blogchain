<?php

namespace App\Helpers;

class ExplodeKeywords
{
    /**
     * Explode and then implode keywords into a comma-separated string.
     *
     * @param array|string|null $keywords
     * @return string
     */
    public static function toString(array|string|null $keywords): string
    {
        return implode(', ', self::explode($keywords));
    }

    /**
     * Explode keywords from a string or array.
     *
     * @param array|string|null $keywords
     * @return array
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
