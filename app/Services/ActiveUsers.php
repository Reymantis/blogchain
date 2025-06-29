<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ActiveUsers
{
    public static function get(): Collection
    {
        return Cache::remember('active', config('session.liftime'), function () {
            return collect(
                DB::table('sessions')
                    ->whereNotNull('user_id')
                    ->where('last_activity', '>', now()->subMinutes(config('session.lifetime'))->timestamp)
                    ->join('users', 'sessions.user_id', '=', 'users.id')
                    ->select(
                        'users.id',
                        'users.name',
                        'users.email',
                        'users.avatar',
                        'users.email_verified_at',
                        //                        'users.email_verified_at',
                        //                        'users.created_at',
                        'sessions.last_activity',
                        'sessions.ip_address',
                        'sessions.user_agent',
                        'sessions.id as session_id'
                    )
                    ->orderBy('sessions.last_activity', 'desc')
                    ->get()
            );
        });
    }
}
