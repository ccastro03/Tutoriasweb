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
			'cod_usuario' => $usuario,
			'cod_rol' => '03' //Rol estudiante
			]);
			
			$user = DB::table('users')->insert([
			'name' => strtolower($ArrDatos['nombre'])." ".strtolower($ArrDatos['apellido1'])." ".strtolower($ArrDatos['apellido2']),
			'email' => $usuario,
			'password' => md5("secret"),
			'estado' => '0',
			'cod_rol' => '03' //Rol estudiante
			]);
			$Respuesta = array($estudiante, "Estudiante agregado corectamente", $codigoEst, $usuario);
			return response()->json($Respuesta);			
		}
    }

    public function validarResponsable(Request $request)
    {
		$ArrDatos = $_GET["ArrDatos"];
		
		$usuario = strtolower($ArrDatos['nomres'])."_".strtolower($ArrDatos['apelres1'])."@tw.com";
		$ExtUsu = DB::table('users')->where('email', '=', $usuario)->exists();
		
		if($ExtUsu == true){
			$usuario = "";
			$usuario = strtolower($ArrDatos['nomres'])."_".strtolower($ArrDatos['apelres1'])."_".strtolower($ArrDatos['apelres2'])."@tw.com";
			$ExtUsu2 = DB::table('users')->where('email', '=', $usuario)->exists();
			
			if($ExtUsu2 == true){
				$usuario = strtolower($ArrDatos['nomres'])."_".strtolower($ArrDatos['apellido2'])."@tw.com";
				$ExtUsu3 = DB::table('users')->where('email', '=', $usuario)->exists();
				
				if($ExtUsu3 == true){
					$usuario = strtolower($ArrDatos['nomres'])."_".substr(str_shuffle("0123456789"), 0, 4)."@tw.com";
				}
			}
		}
		
		$responsable = DB::table('responsables')->insert([
		'tipodocumento' => $ArrDatos['tipdocures'],
		'numdocumento' => $ArrDatos['numdocures'],
		'nombre' => $ArrDatos['nomres'],
		'apellido1' => $ArrDatos['apelres1'],
		'apellido2' => $ArrDatos['apelres2'],
		'cod_pais_nace' => $ArrDatos['painaceres'],			
		'cod_estcivi' => $ArrDatos['tipestciv'],
		'direccion' => $ArrDatos['direcres'],
		'numtelefono' => $ArrDatos['fijores'],
		'numcelular' => $ArrDatos['celures'],
		'email' => $ArrDatos['mailres'],
		'cod_profesion' => $ArrDatos['proferes'],
		'cod_especialidad' => date($ArrDatos['esperes']),
		'empresa' => $ArrDatos['empreres'],
		'cargo' => $ArrDatos['cargres'],
		'dirempresa' => $ArrDatos['dirempres'],
		'telempresa' => $ArrDatos['telempres'],
		'exalumno' => $ArrDatos['exalumres'],
		'notifica' => $ArrDatos['notires'],
		'cod_rol' => '04', //Rol responsable
		'cod_estudiante' => $ArrDatos['codigoest']
		]);
		
		$user = DB::table('users')->insert([
		'name' => strtolower($ArrDatos['nomres'])." ".strtolower($ArrDatos['apelres1'])." ".strtolower($ArrDatos['apelres2']),
		'email' => $usuario,
		'password' => md5("secret"),
		'estado' => '0',
		'cod_rol' => '04'  //Rol responsable
		]);
		$Respuesta = array($responsable, "Responsable agregado corectamente", $usuario);
		return response()->json($Respuesta);
    }

    public function validarAcudiente(Request $request)
    {
		$ArrDatos = $_GET["ArrDatos"];
		
		$usuario = strtolower($ArrDatos['nomres'])."_".strtolower($ArrDatos['apelres1'])."@tw.com";
		$ExtUsu = DB::table('users')->where('email', '=', $usuario)->exists();
		
		if($ExtUsu == true){
			$usuario = "";
			$usuario = strtolower($ArrDatos['nomres'])."_".strtolower($ArrDatos['apelres1'])."_".strtolower($ArrDatos['apelres2'])."@tw.com";
			$ExtUsu2 = DB::table('users')->where('email', '=', $usuario)->exists();
			
			if($ExtUsu2 == true){
				$usuario = strtolower($ArrDatos['nomres'])."_".strtolower($ArrDatos['apellido2'])."@tw.com";
				$ExtUsu3 = DB::table('users')->where('email', '=', $usuario)->exists();
				
				if($ExtUsu3 == true){
					$usuario = strtolower($ArrDatos['nomres'])."_".substr(str_shuffle("0123456789"), 0, 4)."@tw.com";
				}
			}
		}
		
		$acudiente = DB::table('responsables')->insert([
		'tipodocumento' => $ArrDatos['tipdocures'],
		'numdocumento' => $ArrDatos['numdocures'],
		'nombre' => $ArrDatos['nomres'],
		'apellido1' => $ArrDatos['apelres1'],
		'apellido2' => $ArrDatos['apelres2'],
		'cod_pais_nace' => $ArrDatos['painaceres'],			
		'cod_estcivi' => $ArrDatos['tipestciv'],
		'direccion' => $ArrDatos['direcres'],
		'numtelefono' => $ArrDatos['fijores'],
		'numcelular' => $ArrDatos['celures'],
		'email' => $ArrDatos['mailres'],
		'cod_profesion' => $ArrDatos['proferes'],
		'cod_especialidad' => date($ArrDatos['esperes']),
		'empresa' => $ArrDatos['empreres'],
		'cargo' => $ArrDatos['cargres'],
		'dirempresa' => $ArrDatos['dirempres'],
		'telempresa' => $ArrDatos['telempres'],
		'exalumno' => $ArrDatos['exalumres'],
		'notifica' => $ArrDatos['notires'],
		'cod_rol' => '05', //Rol acudiente
		'cod_estudiante' => $ArrDatos['codigoest']
		]);
		
		$user = DB::table('users')->insert([
		'name' => strtolower($ArrDatos['nomres'])." ".strtolower($ArrDatos['apelres1'])." ".strtolower($ArrDatos['apelres2']),
		'email' => $usuario,
		'password' => md5("secret"),
		'estado' => '0',
		'cod_rol' => '05'  //Rol acudiente
		]);
		
		$Respuesta = array($acudiente, "Acudiente agregado corectamente", $usuario);
		return response()->json($Respuesta);
    }	
	
    public function devolverCambios()
    {
		$ArrDatos = $_GET["ArrDatos"];
		
		$estudiante = DB::table('estudiantes')->where('codigo_est', '=', $ArrDatos['codigoest'])->where('numdocumento', '=', $ArrDatos['numdocest'])->delete();
		$responsable = DB::table('responsables')->where('numdocumento', '=', $ArrDatos['numdocres'])->where('cod_estudiante', '=', $ArrDatos['codigoest'])->delete();
		$acudiente = DB::table('responsables')->where('numdocumento', '=', $ArrDatos['numdocacu'])->where('cod_estudiante', '=', $ArrDatos['codigoest'])->delete();
		
		$usrest = DB::table('users')->where('email', '=', $ArrDatos['usuest'])->delete();
		$usrest = DB::table('users')->where('email', '=', $ArrDatos['usures'])->delete();
		$usrest = DB::table('users')->where('email', '=', $ArrDatos['usuacu'])->delete();
		
		$Respuesta = [$estudiante,$responsable,$acudiente,$usrest,$usrest,$usrest];
		
		return response()->json($Respuesta);
	}
	
    public function obtenerListadoInscripciones(Request $request){
		// if($request->input('sede') != ""){
			// $inscripcion = DB::table('inscripciones')->where('sede', 'like', '%'.$request->input('sede').'%')->paginate(10);
		// }else if($request->input('codigo') != ""){
			// $inscripcion = DB::table('inscripciones')->where('numdocest', 'like', '%'.$request->input('codigo').'%')->paginate(10);
		// }else{
			
		// }
		
		$inscripcion = DB::table('inscripciones')->paginate(10);
		var_dump($inscripcion);
		
        // return response()->json(['inscripcion'=>$inscripcion, 'paginate' => [
                // 'total'         =>  $inscripcion->total(),
                // 'current_page'  =>  $inscripcion->currentPage(),
                // 'per_page'      =>  $inscripcion->perPage(),
                // 'last_page'     =>  $inscripcion->lastPage(),
                // 'from '         =>  $inscripcion->firstItem(),
                // 'to'            =>  $inscripcion->lastPage()],
				// ]);		
    }	
}
