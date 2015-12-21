<?php

namespace App\Providers;

use App\Models\Article;
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
        $this->ComposeNavigation();
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
     * Compose the naviation bar.
     */
    private function ComposeNavigation()
    {
        view()->composer('partials.nav', function ($view)
        {
            $view->with('latest', Article::latest()->first());
        });
    }
}
