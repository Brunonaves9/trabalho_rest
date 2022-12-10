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

use App\Http\Controllers\TarefasController;

$router->get('/', function () use ($router) {
    return "Trabalho de Sistemas Distribuidos";
});


/**
 * Grupo de Rotas de Tarefas
 */
$router->group(['prefix' => 'tarefas'], function () use ($router){
    $router->get('/', 'TarefasController@get_tarefas');
    $router->get('/{id}', 'TarefasController@get_tarefas_by_id');
    $router->post('/', 'TarefasController@set_tarefa');
    $router->put('/{id}', 'TarefasController@update_tarefa');
    $router->delete('/{id}', 'TarefasController@delete_tarefa');
});



