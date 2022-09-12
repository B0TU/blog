<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Models\Activity;
use App\Models\Category;
use App\Policies\PostPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\ActivityPolicy;
use App\Policies\CategoryPolicy;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        Category::class => CategoryPolicy::class,
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Activity::class => ActivityPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-status', function(User $user) {
            return $user->can('approve posts');
        });

    }
}
