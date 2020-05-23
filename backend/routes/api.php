<?php

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


$router->group(['prefix' => 'api'], function () use ($router) {

    $router->group(['namespace' => 'Auth'], function () use ($router) {
        $router->post('/auth', 'LoginController@login');
    });

    $router->group(['middleware' => 'auth:api'], function () use ($router) {
        $router->group(['namespace' => 'User', 'prefix' => 'user'], function () use ($router) {
            $router->post('/register', 'UserController@create');
        });

        $router->group(['namespace' => 'Curso', 'prefix' => 'curso'], function () use ($router) {
            $router->get('/{user_id}', 'CursoController@index');
            $router->get('/{id}/{user_id}', 'CursoController@getById');
            $router->post('/register', 'CursoController@create');
        });
    });
});
