<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('view posts');
    }

    public function view(User $user, Post $post)
    {
        return $user->id == $post->author_id || $user->can('view others posts');
    }

    public function create(User $user)
    {
        return $user->can('create posts');
    }

    public function update(User $user, Post $post)
    {
        return $user->id == $post->author_id || $user->can('update posts');
    }

    public function delete(User $user, Post $post)
    {
        return $user->id == $post->author_id || $user->can('delete posts');
    }

    public function updateStatus(User $user)
    {
        return $user->can('approve posts');
    }

}
