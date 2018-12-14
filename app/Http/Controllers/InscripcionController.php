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
			
			$usuario = strtolower($ArrDatos['nombre'])."_".strtolower($ArrDatos['apellido1'])."@tw.com";
			$ExtUsu = DB::table('users')->where('email', '=', $usuario)->exists();
			
			if($ExtUsu == true){
				$usuario = "";
				$usuario = strtolower($ArrDatos['nombre'])."_".strtolower($ArrDatos['apellido1'])."_".strtolower($ArrDatos['apellido2'])."@tw.com";
				$ExtUsu2 = DB::table('users')->where('email', '=', $usuario)->exists();
				
				if($ExtUsu2 == true){
					$usuario = strtolower($ArrDatos['nombre'])."_".strtolower($ArrDatos['apellido2'])."@tw.com";
					$ExtUsu3 = DB::table('users')->where('email', '=', $usuario)->exists();
					
					if($ExtUsu3 == true){
						$usuario = strtolower($ArrDatos['nombre'])."_".substr(str_shuffle("0123456789"), 0, 4);
					}
				}
			}
			
			$estudiante = DB::table('estudiantes')->insert([
			'codigo_est' => $codigoEst,
			'tipodocumento' => $ArrDatos['tipdocu'],
			'numdocumento' => $ArrDatos['numdocumento'],
			'nombre' => $ArrDatos['nombre'],
			'apellido1' => $ArrDatos['apellido1'],
			'apellido2' => $ArrDatos['apellido2'],
			'direccion' => $ArrDatos['direccion'],
			'barrio' => $ArrDatos['barrio'],
			'numtelefono' => $ArrDatos['numfijo'],
			'numcelular' => $ArrDatos['numcelular'],
			'genero' => $ArrDatos['genero'],
			'email' => $ArrDatos['email'],
			'fechanace' => date($ArrDatos['fecha_nace']),
			'cod_ciu_nace' => $ArrDatos['ciunace'],
			'cod_pais_nace' => $ArrDatos['painace'],
			'tiposangre' => $ArrDatos['tiprh'],
			'sede' => $ArrDatos['sede'],
			'grado' => $ArrDatos['grado'],
			'jornada' => $ArrDatos['jornada'],
			'cobertura' => $ArrDatos['cobertura'],
			'grpetnico' => $ArrDatos['etnia'],
			'desplazado' => $ArrDatos['desplaza'],
			'sisben' => $ArrDatos['sisben'],
			'nvlsisben' => $ArrDatos['sisnvl'],
			'cod_eps' => $ArrDatos['eps'],
			'cod_prepagada' => $ArrDatos['prepagada'],
			'cod_ciud_proced' => $ArrDatos['ciuproce'],
			'cole_proced' => $ArrDatos['colproce'],
			'cod_religion' => $ArrDatos['religion'],
			'segurovida' => $ArrDatos['segvida'],
			'asegurador' => $ArrDatos['aseguradora'],
			'nuevo' => 'S',
			'cod_usuario' => $usuario
			]);
			
			$user = DB::table('users')->insert([
			'name' => strtolower($ArrDatos['nombre'])." ".strtolower($ArrDatos['apellido1'])." ".strtolower($ArrDatos['apellido2']),
			'email' => $usuario,
			'password' => md5("secret"),
			'estado' => '0',
			]);
			$Respuesta = array($estudiante, "Estudiante agregado corectamente");
			return response()->json($Respuesta);			
		}
    }	
}
