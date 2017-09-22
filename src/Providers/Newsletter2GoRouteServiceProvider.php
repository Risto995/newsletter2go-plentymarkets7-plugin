<?php
namespace Newsletter2Go\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

class Newsletter2GoRouteServiceProvider extends RouteServiceProvider
{
    /**
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->get('newsletter2go/export', [
            'middleware' => 'oauth',
            'uses' => 'Newsletter2Go\Controllers\ApiController@export'
        ]);
    }
}
