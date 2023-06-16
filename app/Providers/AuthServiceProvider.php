<?php

namespace App\Providers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        $this->registerPolicies();
        
        Gate::define('acesso-restrito-servidor', function(User $user){
            return $user->role_id !== UserRole::SERVIDOR;
        });

        Gate::define('acesso-permitido-admin', function(User $user){
            return $user->role_id === UserRole::ADMIN;
        });
    } 
}
