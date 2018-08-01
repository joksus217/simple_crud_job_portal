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


$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->post('auth', [
    	'middleware' => ['auth_basic'],
    	'uses' => 'UserController@auth'
	]);

	$router->post('job/{id}/proposal', [
    	'middleware' => ['auth_bearer', 'submit_proposal'],
    	'uses' => 'ProposalController@create'
	]);

	$router->get('job/{id}/proposal', [
    	'middleware' => ['auth_bearer'],
    	'uses' => 'ProposalController@get'
	]);
});
