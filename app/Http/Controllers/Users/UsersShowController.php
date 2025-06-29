<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class UsersShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user): View
    {
        $user->loadCount('posts');

        return view('pages.users.show', compact('user'));
    }
}
