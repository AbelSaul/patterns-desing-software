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

$router->get('/key', function() {
    return str_random(32);
});



$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {

	//Con el middlware auth primero pasa por el AuthServiceProvider y comprueba que haiga un usuario en la bd identificado con ese api_token 

	$router->get('listbook',['uses' => 'BookController@list']);

    $router->get('book',  ['uses' => 'BookController@index']);
  
    $router->get('book/{id}', ['uses' => 'BookController@show']);
  
    $router->post('book', ['uses' => 'BookController@create']);
  
    $router->delete('book/{id}', ['uses' => 'BookController@delete']);
  
    $router->put('book/{id}', ['uses' => 'BookController@update']);
});


// $router->get('/list',['middleware'=>'auth','uses' => 'BookController@list']);