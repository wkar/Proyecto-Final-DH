<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// AJAX PARA RETORNAR SUBCATEGORIAS
// API
Route::get('/getSubcategorias','ajaxController@traerSubc');

Route::get('/','routeController@showIndex');
Route::get('/index','routeController@showIndex');
Route::get('/faq','routeController@showFaq');
Route::get('/listado', 'productoController@listado');

Route::get('/register','Auth\RegisterController@showRegistrationForm');
Route::post('/register','Auth\RegisterController@register');
Route::get('/login','Auth\LoginController@showLoginForm');
Route::post('/login','Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware'=>'auth'], function() {
  Route::get('producto/nuevo', 'productoController@showNuevo');
  Route::get('producto/editar/{id}', 'productoController@showEditar');
  Route::get('producto/borrar/{id}', 'productoController@showBorrar');
  Route::post('producto/nuevo', 'productoController@productoNuevo');
  Route::post('producto/editar/{id}', 'productoController@productoEditar');
  Route::post('producto/borrar/{id}', 'productoController@productoBorrar');
  Route::get('/inventario', 'productoController@inventario');
});
