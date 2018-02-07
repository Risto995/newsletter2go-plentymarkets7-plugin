<?php

namespace Newsletter2Go\Providers;

use Newsletter2Go\Controllers\ApiController;
use Newsletter2Go\Controllers\CallbackController;
use Plenty\Plugin\RouteServiceProvider as BaseRouteServiceProvider;
use Plenty\Plugin\Routing\ApiRouter;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    public function map(ApiRouter $apiRouter)
    {
        $apiRouter->get('bla', 'Newsletter2Go\Controllers\ApiController@test');


        /*$controllerClass = ApiController::class;
        $callbackController = CallbackController::class;
        $apiRouter->get('newsletter2go/test', $controllerClass . '@test');*/
        
        /*$apiRouter->version(['v1'], ['middleware' => 'oauth'], function ($apiRouter) {

            $apiRouter->get('newsletter2go/test', $controllerClass . '@test');
            $apiRouter->get('newsletter2go/version', $controllerClass . '@version');
            $apiRouter->get('newsletter2go/count', $controllerClass . '@customerCount');
            $apiRouter->get('newsletter2go/customers', $controllerClass . '@customers');
            $apiRouter->get('newsletter2go/callback', $callbackController . '@callback');
        });*/
    }
}
