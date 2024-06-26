<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('isAdmin',function($user)
        {
            return $user->role ==='admin';
        });

        Gate::define('isTeacher',function($user)
        {
            return $user->role === 'nastavnik';
        });

        Gate::define('isStudent',function($user)
        {
            return $user->role ==='student';
        });
    }
}
