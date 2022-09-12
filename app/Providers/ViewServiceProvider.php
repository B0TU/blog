<?php

namespace App\Providers;

use App\View\Composers\CategoriesComposer;
use App\View\Composers\TitleComposer;
use Illuminate\Support\Facades\View;
use App\View\Composers\TopNavComposer;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            // 'web.partials.header',
            // 'web.partials.footer',
        ], TopNavComposer::class);

        View::composer('web.partials.sidebar', CategoriesComposer::class);
        View::composer('layouts.web', TitleComposer::class);

    }
}
