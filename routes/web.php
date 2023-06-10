<?php

use App\Http\Controllers\LumenAuthController;

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



$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('/register', 'AuthController@register');
    $router->post('/login', 'AuthController@login');

    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->post('/logout', 'AuthController@logout');
        $router->get('/me', 'AuthController@me');

            $router->group(['middleware' => 'verify'], function () use ($router) {
                $router->get('/profile', 'Controller@profile');
                $router->get('/payment', 'Controller@payment');

            });
        // $router->get('/index', 'Controller@index');
        // $router->post('/posts', 'PostController@store');
        // $router->put('/posts/{id}', 'PostController@update');
        // $router->delete('/posts/{id}', 'PostController@destroy');
    });
});

 // get packages
$router->get('/api/packs', 'Controller@GetPacks');

























// $router->group(['prefix' => 'api'], function () use ($router) {
//     $router->post('register', 'LumenAuthController@register');
//     $router->post('login', 'LumenAuthController@login');
//     $router->post('logout', 'LumenAuthController@logout');
//     $router->post('refresh', 'LumenAuthController@refresh');
//     $router->post('me', 'LumenAuthController@me');
// });

