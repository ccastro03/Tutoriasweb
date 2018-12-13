<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
	/*
    public function __construct()
    {
		$this->middleware('auth');
    }
	*/
	
    public function index()
    {
        return view('admin.incripciones.index');
    }

    public function create()
    {
		$ciudades = DB::table('ciudades')->get();
		$barrios = DB::table('barrios')->get();
		$paises = DB::table('paises')->get();
		$sedes = DB::table('sedes')->get();
		$grados = DB::table('grados')->get();
		$jornadas = DB::table('jornadas')->get();
		$etnias = DB::table('etnias')->get();
		$eps = DB::table('eps')->get();
		$prepagadas = DB::table('prepagada')->get();
		$religiones = DB::table('religion')->get();
		$aseguradoras = DB::table('aseguradora')->get();
		return view('admin.incripciones.create', ['ciudades' => ($ciudades),'paises' => ($paises),'sedes' => ($sedes),'grados' => ($grados),
		'jornadas' => ($jornadas),'etnias' => ($etnias),'eps' => ($eps),'prepagadas' => ($prepagadas),'religiones' => ($religiones),
		'aseguradoras' => ($aseguradoras),'barrios' => ($barrios)]);
    }

    public function validarEstudiante(Request $request)
    {
		$ArrDatos = $_GET["ArrDatos"];
		
		$VerExist = DB::table('estudiantes')->where('numdocumento', '=', $ArrDatos['numdocumento'])->exists();
		if($VerExist == true){
			$Respuesta = array("0", "El estudiante con numero de documento ".$ArrDatos['numdocumento'].",ya existe");
			return response()->json($Respuesta);
		}else{
		
			$codbdEst = DB::table('estudiantes')->select('codigo_est')->orderBy('codigo_est', 'desc')->get();
			if(count($codbdEst) == 0){
				$codigoEst = '20190000';
			}else{
				$codigoEst = $codbdEst[0]->codigo_est + 1;
			}
			
			$estudiante = DB::table('estudiantes')->insert(['codigo_est' => $codigoEst,'numdocumento' => $ArrDatos['numdocumento']]);
			$Respuesta = array($estudiante, "Estudiante agregado corectamente");
			return response()->json($Respuesta);			
		}
    }	
}
