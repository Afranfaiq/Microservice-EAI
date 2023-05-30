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

$router->get('Product','ProductController@index');

$router->get('Product/{id}','ProductController@show');

$router->delete('Product/{id}','ProductController@destroy');

$router->put('Product/{id}','ProductController@update');

$router->post('Product','ProductController@create');
