<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/{any}', 'SpaController@index')->where('any', '.*');

$router->group(['prefix' => 'property'], function() use ($router) {
    $router->get('/', 'PropertyController@show');
    // $router->get('/{id}', 'PropertyController@findById');
    // $router->post('/find', 'PropertyController@find');
    $router->post('/', 'PropertyController@create');
    $router->delete('/{id}', 'PropertyController@delete');
});
