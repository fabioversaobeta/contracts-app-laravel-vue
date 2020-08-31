<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/{any}', 'SpaController@index')->where('any', '.*');

$router->group(['middleware' => 'cors'], function() use ($router) {
    $router->get('/property', 'PropertyController@show');
    $router->post('/property', 'PropertyController@create');
    $router->delete('/property/{id}', 'PropertyController@delete');
    $router->put('/property/{id}/setContract/', 'PropertyController@setContract');
});

$router->group(['middleware' => 'cors', 'prefix' => 'contractor'], function() use ($router) {
    $router->get('/', 'ContractorController@show');
    $router->post('/', 'ContractorController@create');
});

$router->group(['middleware' => 'cors', 'prefix' => 'contract'], function() use ($router) {
    $router->get('/', 'ContractController@show');
    $router->post('/', 'ContractController@create');
});
