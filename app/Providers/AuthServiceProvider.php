<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if (is_object($this->getPermissions())) {
            foreach ($this->getPermissions() as $permission) {
                Gate::define($permission->label, function($user) use ($permission) {
                    return $user->hasRole($permission->groups);
                });
            }
        }
    }

    protected function getPermissions()
    {
        return Permission::with('groups')->get();
    }
}
