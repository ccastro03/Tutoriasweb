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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(array('before' => 'auth'), function()
{
	Route::get('/home', 'HomeController@index')->name('home');
	
	/*  ROLES  */
	Route::get('/roles/obtenerlistadoroles', 'RolesController@obtenerListadoRoles')->middleware('auth');
	Route::get('/roles/eliminar', 'RolesController@eliminar')->middleware('auth');
	Route::resource('/roles', 'RolesController',
		['except' => ['destroy']])->middleware('auth');
	/***********/

	/*  FUNCIONES  */
	Route::get('/funciones/obtenerlistadofunciones', 'FuncionesController@obtenerListadoFunciones')->middleware('auth');
	Route::get('/funciones/eliminar', 'FuncionesController@eliminar')->middleware('auth');
	Route::resource('/funciones', 'FuncionesController',
		['except' => ['destroy']])->middleware('auth');
	/***************/

	/*  PAISES  */
	Route::get('/paises/obtenerlistadopaises', 'PaisesController@obtenerListadoPaises')->middleware('auth');
	Route::get('/paises/eliminar', 'PaisesController@eliminar')->middleware('auth');
	Route::resource('/paises', 'PaisesController',
		['except' => ['destroy']])->middleware('auth');
	/************/
	
	/*  CIUDADES  */
	Route::get('/ciudades/obtenerlistadociudades', 'CiudadesController@obtenerListadoCiudades')->middleware('auth');
	Route::get('/ciudades/eliminar', 'CiudadesController@eliminar')->middleware('auth');
	Route::resource('/ciudades', 'CiudadesController',
		['except' => ['destroy']])->middleware('auth');
	/**************/	
	
	/*  CIUDADES  */
	Route::get('/prepagada/obtenerlistadoprepagada', 'PrepagadaController@obtenerListadoPrepagada')->middleware('auth');
	Route::get('/prepagada/eliminar', 'PrepagadaController@eliminar')->middleware('auth');
	Route::resource('/prepagada', 'PrepagadaController',
		['except' => ['destroy']])->middleware('auth');
	/**************/

	/*  EPS  */
	Route::get('/eps/obtenerlistadoeps', 'EpsController@obtenerListadoEps')->middleware('auth');
	Route::get('/eps/eliminar', 'EpsController@eliminar')->middleware('auth');
	Route::resource('/eps', 'EpsController',
		['except' => ['destroy']])->middleware('auth');
	/*********/	
});