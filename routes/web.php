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

$router->group(['middleware' => 'auth:api', 'prefix' => 'v1'], function ($router) {

    $router->get('/books', 'ApiController@index');
    $router->get('/books/{id}', 'ApiController@show');
    $router->post('/books', 'ApiController@store');
    $router->put('/books/{id}', 'ApiController@update');
    $router->delete('/books/{id}', 'ApiController@destroy');
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
});
