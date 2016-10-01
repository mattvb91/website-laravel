<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Page;
use App\Models\Tag;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Route::bind('article', function ($slug)
        {
            if (! Auth::user())
            {
                return Article::published()->slug($slug)->first();
            }

            return Article::findBySlugOrIdOrFail($slug);
        });

        Route::bind('tag', function ($slug)
        {
            if (! Auth::user())
            {
                return Tag::slug($slug)->first();
            }

            return Tag::findBySlugOrIdOrFail($slug);
        });

        Route::bind('page', function($id)
        {
            return Page::find($id);
        });

    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router)
        {
            require app_path('Http/routes.php');
        });
    }
}
