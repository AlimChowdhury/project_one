<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access-admin', function (User $user, $id) {
            return $user->role === 'admin' && $user->id == $id;
        });

        Gate::define('view-post', fn($user) => $user->hasPermission('view'));

        Gate::define('edit-post', fn($user) => $user->hasPermission('edit'));

        Gate::define('delete-post', fn($user) => $user->hasPermission('delete'));

    


    }
}
