<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group( ['prefix' => 'api'], function() use ($router){

    $router->get('Auth',['uses' => 'AuthController@index']);

    $router->post('AuthRegister',['uses' => 'AuthController@register']);

    $router->post('AuthLogin',['uses' =>'AuthController@login']);

    $router->post('AuthLogout',['uses' =>'AuthController@logout']);

} ) ;