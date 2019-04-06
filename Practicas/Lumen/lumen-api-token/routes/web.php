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
   $router->get('authors',  ['uses' => 'AuthorController@showAllAuthors']);
    $router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);
    $router->post('authors', ['uses' => 'AuthorController@create']);
    $router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);
    $router->put('authors/{id}', ['uses' => 'AuthorController@update']);
});

/*
$router->get('/list',['middleware'=>'auth',function(Request $request){
	$array=[
		['name'=>"Learning LUMEN","author"=>"Chinin"],
		['name'=>"Expert SOA","author"=>"Saul"],

	];
	return response()->json($array);
}]);
*/


// http://localhost:8000/list?api_token=0001

//Primero pasaria por el middlware auth. En el archivo AuthServiceProvider preguntara si el api_token que estamos pasando por la url corresponde a un usuario en la base de datos si es asi nos mostrar el array de de datos

$router->get('/list',['middleware'=>'auth','uses'=>'BookController@list']);
