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
	
	/*  BARRIOS  */
	Route::get('/barrios/obtenerlistadobarrios', 'BarriosController@obtenerListadoBarrios')->middleware('auth');
	Route::get('/barrios/eliminar', 'BarriosController@eliminar')->middleware('auth');
	Route::get('/barrios/{cod_ciudad}/{cod_barrio}/show', 'BarriosController@show')->middleware('auth');
	Route::get('/barrios/{cod_ciudad}/{cod_barrio}/edit', 'BarriosController@edit')->middleware('auth');
	Route::put('/barrios/update/{cod_ciudad}/{cod_barrio}', 'BarriosController@update')->middleware('auth');
	Route::resource('/barrios', 'BarriosController',
		['except' => ['destroy','show','edit','update']])->middleware('auth');
	/*************/	

	/*  SEDES  */
	Route::get('/sedes/obtenerlistadosedes', 'SedesController@obtenerListadoSedes')->middleware('auth');
	Route::get('/sedes/eliminar', 'SedesController@eliminar')->middleware('auth');
	Route::resource('/sedes', 'SedesController',
		['except' => ['destroy']])->middleware('auth');
	/*********/		
	
	/*  JORNADAS  */
	Route::get('/jornadas/obtenerlistadojornadas', 'JornadasController@obtenerListadoJornadas')->middleware('auth');
	Route::get('/jornadas/eliminar', 'JornadasController@eliminar')->middleware('auth');
	Route::resource('/jornadas', 'JornadasController',
		['except' => ['destroy']])->middleware('auth');
	/*********/

	/*  GRADOS  */
	Route::get('/grados/obtenerlistadogrados', 'GradosController@obtenerListadoGrados')->middleware('auth');
	Route::get('/grados/eliminar', 'GradosController@eliminar')->middleware('auth');
	Route::resource('/grados', 'GradosController',
		['except' => ['destroy']])->middleware('auth');
	/*********/	
	
	/*  ETNIAS  */
	Route::get('/etnias/obtenerlistadoetnias', 'EtniasController@obtenerListadoEtnias')->middleware('auth');
	Route::get('/etnias/eliminar', 'EtniasController@eliminar')->middleware('auth');
	Route::resource('/etnias', 'EtniasController',
		['except' => ['destroy']])->middleware('auth');
	/*********/	
	
	/*  RELIGION  */
	Route::get('/religion/obtenerlistadoreligiones', 'ReligionController@obtenerListadoReligiones')->middleware('auth');
	Route::get('/religion/eliminar', 'ReligionController@eliminar')->middleware('auth');
	Route::resource('/religion', 'ReligionController',
		['except' => ['destroy']])->middleware('auth');
	/*********/	

	/*  ASEGURADORAS  */
	Route::get('/aseguradora/obtenerlistadoaseguradoras', 'AseguradoraController@obtenerListadoAseguradoras')->middleware('auth');
	Route::get('/aseguradora/eliminar', 'AseguradoraController@eliminar')->middleware('auth');
	Route::resource('/aseguradora', 'AseguradoraController',
		['except' => ['destroy']])->middleware('auth');
	/*********/		
	
	/*  INSCRIPCIONES  */
	Route::get('/nuevaInscripcion', 'InscripcionController@create');
	
	Route::get('/incripciones/validarEstudiante', 'InscripcionController@validarEstudiante');
	Route::get('/incripciones/validarResponsable', 'InscripcionController@validarResponsable');
	Route::get('/incripciones/validarAcudiente', 'InscripcionController@validarAcudiente');
	Route::get('/incripciones/devolverCambios', 'InscripcionController@devolverCambios');
	Route::get('/incripciones/obtenerlistadoinscripciones', 'InscripcionController@obtenerListadoInscripciones')->middleware('auth');
	Route::resource('/incripciones', 'InscripcionController',
		['except' => ['destroy','show']])->middleware('auth');
	/*******************/
});