<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function index(User $user): bool
    {
        // Por ejemplo, permitir a todos los usuarios autenticados
        return true;
    }


    public function view(User $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->id > 0;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
{
    // Denegar si el post pertenece al usuario con ID 2
    if ($post->user_id === 2) {
        return false;
    }

    // Permitir si el usuario es el dueño del post
    return $user->id === $post->user_id;
}


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->id == $post->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        return false;
    }
}
