<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Bookmark;
use App\Models\User;

class BookmarkPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Bookmark');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Bookmark $bookmark): bool
    {
        return $user->checkPermissionTo('view Bookmark');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Bookmark');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Bookmark $bookmark): bool
    {
        return $user->checkPermissionTo('update Bookmark');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Bookmark $bookmark): bool
    {
        return $user->checkPermissionTo('delete Bookmark');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Bookmark');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Bookmark $bookmark): bool
    {
        return $user->checkPermissionTo('restore Bookmark');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Bookmark');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Bookmark $bookmark): bool
    {
        return $user->checkPermissionTo('replicate Bookmark');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Bookmark');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Bookmark $bookmark): bool
    {
        return $user->checkPermissionTo('force-delete Bookmark');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Bookmark');
    }
}
