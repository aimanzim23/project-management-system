<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\System;
use App\Policies\SystemPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        System::class => SystemPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('isBusinessUnit', function ($user){
            return $user->user_level == 0;
        });
        Gate::define('isManager', function ($user){
            return $user->user_level == 3;
        });
        Gate::define('isDeveloper', function ($user){
            return $user->user_level == 5;
        });
    }
}
