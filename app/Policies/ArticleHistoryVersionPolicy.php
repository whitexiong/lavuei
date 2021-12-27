<?php

namespace App\Policies;

use App\Models\ArticleHistoryVersion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ArticleHistoryVersionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->checkRole('user');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  ArticleHistoryVersion  $articleHistoryVersion
     * @return Response|bool
     */
    public function view(User $user, ArticleHistoryVersion $articleHistoryVersion)
    {
        return $user->checkRole('user');

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  ArticleHistoryVersion  $articleHistoryVersion
     * @return Response|bool
     */
    public function update(User $user, ArticleHistoryVersion $articleHistoryVersion)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  ArticleHistoryVersion  $articleHistoryVersion
     * @return Response|bool
     */
    public function delete(User $user, ArticleHistoryVersion $articleHistoryVersion)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  ArticleHistoryVersion  $articleHistoryVersion
     * @return Response|bool
     */
    public function restore(User $user, ArticleHistoryVersion $articleHistoryVersion)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  ArticleHistoryVersion  $articleHistoryVersion
     * @return Response|bool
     */
    public function forceDelete(User $user, ArticleHistoryVersion $articleHistoryVersion)
    {
        //
    }
}
