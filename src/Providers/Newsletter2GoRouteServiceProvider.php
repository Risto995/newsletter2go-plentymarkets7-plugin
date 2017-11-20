<?php
namespace Newsletter2Go\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;
use Plenty\Plugin\Routing\ApiRouter;

/**
 * Class Newsletter2GoRouteServiceProvider
 * @package Newsletter2Go\Providers
 */
class Newsletter2GoRouteServiceProvider extends RouteServiceProvider
{

/*	public function map(Router $router, ApiRouter $api)
	{
        $api->get('newsletter2go/export', 'Newsletter2Go\Controllers\ApiController@export');
		$api->get('newsletter2go/customers', 'Newsletter2Go\Controllers\ApiController@customers');
	}*/

    public function map(Router $router)
    {
        $router->get('newsletter2go/export', [
            'uses'       => 'Newsletter2Go\Controllers\ApiController@export'
        ]);

		$router->get('newsletter2go/customers', [
			'uses'       => 'Newsletter2Go\Controllers\ApiController@customers'
		]);
    }
}
