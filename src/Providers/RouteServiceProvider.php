<?php

namespace Waterloocode\Router\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //
        $this->namespace = config("router.namespace.controller",$this->namespace);
        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            // require app_path('Http/routes.php');
            foreach (glob(config("router.path.router",app_path('Http//Routes')) . '/*.php') as $file) {
                $this->app->make(config("router.namespace.route",'App\\Http\\Routes\\') . basename($file, '.php'))->map($router);
            }
        });
    }
}
