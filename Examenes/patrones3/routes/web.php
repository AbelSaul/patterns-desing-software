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

$router->get('/promedio/{alumno_codigo}','ExamenController@promedioPonderado');
$router->get('/libros/{alumno_codigo}','ExamenController@libros');
$router->get('/ingles/{alumno_codigo}','ExamenController@ingles');


$router->get('/deudaCFF/{alumno_codigo}','ExamenController@deudaCFF');
$router->get('/deudaOBU/{alumno_codigo}','ExamenController@deudaOBU');
$router->get('/deudaFIIS/{alumno_codigo}','ExamenController@deudaFIIS');
$router->get('/deudaUNAS/{alumno_codigo}','ExamenController@deudaUNAS');


$router->get('/cursosfiis/{alumno_codigo}','ExamenController@cursosFiis');

$router->get('/carrera/{alumno_codigo}','ExamenController@carrera');

