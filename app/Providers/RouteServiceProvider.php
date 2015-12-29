<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

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
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        $router->bind('article', function ($slug)
        {
            if (! Auth::user())
            {
                return Article::published()->slug($slug)->first();
            }

            return Article::findBySlugOrIdOrFail($slug);
        });

        $router->bind('tag', function ($name)
        {
            //TODO this isnt the neatest, cant clean up a bit.
            if(!$res = Tag::find($name))
            {
                $res = Tag::where('name', $name)->firstOrFail();
            }

            return $res;
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
