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
	Route::get('/roles/obtenerlistadoroles', 'RolesController@obtenerListadoRoles');
	Route::get('/roles/eliminar', 'RolesController@eliminar');
	Route::resource('/roles', 'RolesController',
		['except' => ['destroy']])->middleware('auth');
	/***********/

	/*  FUNCIONES  */
	Route::get('/funciones/obtenerlistadofunciones', 'FuncionesController@obtenerListadoFunciones');
	Route::get('/funciones/eliminar', 'FuncionesController@eliminar');
	Route::resource('/funciones', 'FuncionesController',
		['except' => ['destroy']])->middleware('auth');
	/***************/

	/*  PAISES  */
	Route::get('/paises/obtenerlistadopaises', 'PaisesController@obtenerListadoPaises');
	Route::get('/paises/eliminar', 'PaisesController@eliminar');
	Route::resource('/paises', 'PaisesController',
		['except' => ['destroy']])->middleware('auth');
	/************/
	
	/*  CIUDADES  */
	Route::get('/ciudades/obtenerlistadociudades', 'CiudadesController@obtenerListadoCiudades');
	Route::get('/ciudades/eliminar', 'CiudadesController@eliminar');
	Route::resource('/ciudades', 'CiudadesController',
		['except' => ['destroy']])->middleware('auth');
	/**************/	
	


	/*  EPS  */
	Route::get('/eps/obtenerlistadoeps', 'EpsController@obtenerListadoEps');
	Route::get('/eps/eliminar', 'EpsController@eliminar');
	Route::resource('/eps', 'EpsController',
		['except' => ['destroy']])->middleware('auth');
	/*********/	
});