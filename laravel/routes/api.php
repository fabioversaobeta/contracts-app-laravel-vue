<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// $router->group(['prefix' => 'contract'], function() use ($router) {
//     $router->get('contracts', 'ContractController@index');
//     $router->post('contract', 'ContractController@create');
//     $router->delete('contract', 'ContractController@delete');
// });

$router->group(['prefix' => 'contractor'], function() use ($router) {
    $router->get('/', 'ContractController@show');
    $router->get('/{id}', 'ContractController@findById');
    $router->post('/find', 'ContractController@find');
    $router->post('/', 'ContractController@create');
    $router->delete('/{id}', 'ContractController@delete');
});

$router->group(['prefix' => 'property'], function() use ($router) {
    $router->get('/', 'PropertyController@show');
    // $router->get('/{id}', 'PropertyController@findById');
    // $router->post('/find', 'PropertyController@find');
    $router->post('/', 'PropertyController@create');
    $router->post('/delete/{id}', 'PropertyController@drop');
});
