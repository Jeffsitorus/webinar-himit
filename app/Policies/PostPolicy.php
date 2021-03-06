<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function update(User $user, Post $post)
    {
        return $user->id == $post->created_by;
    }

    public function delete(User $user, Post $post)
    {
        return $user->id == $post->created_by;
    }
}
