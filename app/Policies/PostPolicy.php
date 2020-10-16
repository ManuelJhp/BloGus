<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function before($user)
    {
        if ($user->hasRole('Admin'))
        {
            return true;
        }
    }

    public function view(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->hasPermissionTo('View posts');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Create posts');
    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->hasPermissionTo('Update posts');
    }

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->hasPermissionTo('Delete posts');
    }
}
