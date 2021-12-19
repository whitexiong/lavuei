<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return $user->checkRole('user');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Article  $article
     * @return Response|bool
     */
    public function view(User $user, Article $article)
    {
        return $user->checkRole('user');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Article  $article
     * @return bool
     */
    public function update(User $user, Article $article)
    {
        return $user->id === $article->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Article  $article
     * @return Response|bool
     */
    public function delete(User $user, Article $article)
    {
        //
    }

    public function destroy(User $user, Article $article)
    {
        return $user->id === $article->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Article  $article
     * @return Response|bool
     */
    public function restore(User $user, Article $article)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Article  $article
     * @return Response|bool
     */
    public function forceDelete(User $user, Article $article)
    {
        //
    }
}
