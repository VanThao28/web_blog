<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        try{
            Permission::get()->map(function(Permission $permission){
                Gate::define($permission->code, function (User $user) use ($permission){
                    return $user-> hasPermissionThroughRole($permission);
                });
            });
        } catch (\Exception $e) {
            report($e);
            return false;
        }
        Blade::directive('role', function (Role $role){
            return "if(auth()->check() && auth()->user()->hasRole({$role})) :";
        });
        Blade::directive('endrole', function (Role $role){
            return "endif;";
        });
    }
}
