<?php

namespace App\Policies;

use App\Models\Like;
use App\Models\User;

class LikePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Like');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Like $like): bool
    {
        return $user->checkPermissionTo('view Like');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Like');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Like $like): bool
    {
        return $user->checkPermissionTo('update Like');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Like $like): bool
    {
        return $user->checkPermissionTo('delete Like');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Like');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Like $like): bool
    {
        return $user->checkPermissionTo('restore Like');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Like');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Like $like): bool
    {
        return $user->checkPermissionTo('replicate Like');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Like');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Like $like): bool
    {
        return $user->checkPermissionTo('force-delete Like');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Like');
    }
}
