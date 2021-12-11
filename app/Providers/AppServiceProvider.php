<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::before(function (User $user, $ability){
            if($user->checkRole('admin')){
                return true;
            }
        });

        Gate::before(function (User $article, $ability){
            if($article->checkRole('admin')){
                return true;
            }
        });

        User::observe(UserObserver::class);
    }
}
