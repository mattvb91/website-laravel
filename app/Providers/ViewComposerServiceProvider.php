<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation();
        $this->composeSidebar();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Compose the navigation bar.
     */
    private function composeNavigation()
    {
        view()->composer('partials.nav', function ($view)
        {
            $view->with('latest', Article::latest()->first());
        });
    }

    /**
     * Compose the sidebar.
     */
    private function composeSidebar()
    {
        view()->composer('partials.sidebar', function ($view)
        {
            $view->with('latest', Article::published()->latest(5)->get());
            $view->with('tags', Tag::all());
        });
    }
}
