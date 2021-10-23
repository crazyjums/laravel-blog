<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * @var \Laravel\Lumen\Routing\Router $router
 * 所有路由统一用驼峰命名法
 */

Route::get('/', function () {
    return view('welcome');
});

$router->group(['namespace' => 'Test'], function () use ($router) {
    $router->get('/getTest', 'TestController@getTest');
});

$router->group(['prefix' => 'account', 'namespace' => 'Test'], function () use ($router) {
    $router->get('/getTest', 'TestController@getTest');
});


