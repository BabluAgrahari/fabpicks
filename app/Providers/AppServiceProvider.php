<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('crm.layout.pagination');

        /* define a admin user role */
        Gate::define('isAdmin', function (User $user) {
            return $user->role == 'admin';
        });

        /* define a client user role */
        Gate::define('isClient', function (User $user) {
            return $user->role == 'client';
        });

    }
}
