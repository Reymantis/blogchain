<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function creating(User $user): void
    {
        // Assign default role if not already assigned
        $user->assignRole('Blogger');

        // Generate base username from name
        $baseUsername = strtolower(str_replace([' ', '.'], '', $user->name));

        // Check if username exists and generate unique one
        $username = $baseUsername;
        $counter = 1;

        while (User::where('username', $username)->exists()) {
            $username = $baseUsername.rand(10, 99); // 2-digit random number
            $counter++;

            // Fallback: if we've tried too many times, use timestamp
            if ($counter > 10) {
                $username = $baseUsername.time();
                break;
            }
        }

        $user->username = $username;
    }

    /**
     * Handle the User "updated" event.
     */
    public function updating(User $user): void
    {
        $user->username = strtolower(str_replace([' ', '.'], '', $user->username));
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
