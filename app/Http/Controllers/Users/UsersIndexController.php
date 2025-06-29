<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class UsersIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $users): View
    {
        return view('pages.users.index', [
            'users' => User::has('posts') // only users with posts
                ->withCount('posts')      // add posts_count
                ->latest()
                ->paginate(config('blogchain.pagination.per_page')),
        ]);
    }
}
