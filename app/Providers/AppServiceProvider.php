<?php

namespace App\Providers;

use App\Models\Activity;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Spatie\Permission\Models\Role;

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
        Relation::enforceMorphMap([
            'user' => User::class,
            'category' => Category::class,
            'post' => Post::class,
            'activity' => Activity::class,
            'role' => Role::class
            
        ]);
    }
}
