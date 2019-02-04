<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use PHPMailer\PHPMailer;

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
	
    public function show($id)
    {	
		$inscripciones = DB::table('inscripciones')->where('codigo', '=', $id)->get();
		$estudiante = DB::table('estudiantes')->where('numdocumento', '=', $inscripciones[0]->numdocest)->get();
		$sedes = DB::table('sedes')->where('codigo', '=', $inscripciones[0]->sede)->get();
		return view('admin.incripciones.show', ['inscripciones' => $inscripciones[0], 'estudiante' => $estudiante[0], 'sedes' => $sedes[0]]);
    }
	
    public function edit($id)
    {	
		$inscripciones = DB::table('inscripciones')->where('codigo', '=', $id)->get();
		$estudiante = DB::table('estudiantes')->where('numdocumento', '=', $inscripciones[0]->numdocest)->get();
		$sedes = DB::table('sedes')->get();
		return view('admin.incripciones.edit', ['inscripciones' => $inscripciones[0], 'estudiante' => $estudiante[0], 'sedes' => $sedes]);
    }
	
    public function actualizar(Request $request)
    {		
		$ArrDatos = $_GET["ArrDatos"];
		$estadocitares = "";
		$estadocitaacu = "";
		$estadoaprores = "";
		$estadoaproacu = "";
		
		$estudian = DB::table('estudiantes')->where('numdocumento', '=', $ArrDatos['codEstud'])->get();
		$responsable = DB::table('responsables')->where('cod_estudiante', '=', $ArrDatos['codEstud'])->where('cod_rol', '=', '04')->get();
		$acudiente = DB::table('responsables')->where('cod_estudiante', '=', $ArrDatos['codEstud'])->where('cod_rol', '=', '05')->get();
		
		$inscrip = DB::table('inscripciones')->where('codigo', '=', $ArrDatos['codInscrip'])->update([
		'sede' => $ArrDatos['codsede'],
		'verificada' => $ArrDatos['chverif'],
		'citacion' => $ArrDatos['chcita'],
		'obs_cita' => $ArrDatos['obscitacion'],
		'aprobada' => $ArrDatos['chaprob'],
		'obs_aprueba' => $ArrDatos['obsaprobada'],
		'pago' => $ArrDatos['chpago'],
		'fechaverif' => $ArrDatos['fecverif'],
		'fechaobserv' => $ArrDatos['feccita'],
		'fechaaprue' => $ArrDatos['fecaproba'],
		'fechapago' => $ArrDatos['fecpago'],
		]);
		
		/* CORREO PARA LA CITACION */
		
		if($ArrDatos['chcita'] == "S" && $ArrDatos['obscitacion'] != ""){
			if(count($responsable) != 0){
				if($responsable[0]->notifica == "S"){
				    
					$asunto = "Citación entrevista por la inscripción del estudiante ".$estudian[0]->nomcomple;
					
					$html = '
					<html>
					<head>
					</head>
					<body>
						<table align="center" border="0" cellpadding="0" cellspacing="0" width="800">
							<tr>
								<table>
									<tr>
										<td align="center">
											
										</td>
									</tr>								
									<tr>
										<td align="center" bgcolor="#1bb1e5">
											<span style="color:#fff;font-weight:900;font-size:41px;line-height:48px;font-family:Roboto,Helvetica,Arial,sans-serif" >
												COLEGIO XXXXXXXX
											</span>
										</td>
									</tr>
								</table>
							</tr>
							<tr>
								<td style="background:#fff;padding:45px" valign="top" width="740">
									<h1 style="font-size:20pt;color:#000;font-family:Arial">Hola, '.$responsable[0]->nomcomple.'!</h1>								
									<p style="color:#5a5b5c;font-size:10pt;font-family:Arial;line-height:1.3">
									Para nosotros como institución es grato que nos haya elegido, por tal motivo queremos invitarle a
									una entrevista el dia: <strong>'.$ArrDatos["feccita"].'</strong> para poder seguir con el proceso de inscripción
									de su hijo <strong>'.$estudian[0]->nomcomple.'</strong></p>
								</td>
							</tr>
							<tr>
								<td valign="top">
									<p style="font-family:Arial;font-size:8pt;color:#5a5b5c;text-align:center;padding:10px 0px">
										Copyright@2019 INFORMATICA AL D&A. todos los derechos reservados</p>
								</td>
							</tr>							
						</table>
					</body>
					</html>
					';
					
					$correo = new PHPMailer\PHPMailer();

                    //$correo->SMTPDebug = 1;
					$correo->IsSMTP();
					$correo->Host = "p3plcpnl0881.prod.phx3.secureserver.net";
					$correo->Port = 465;	
					$correo->SMTPSecure = "ssl";
					$correo->SMTPAuth = true;
					$correo->Username = "superadmin@informaticaldia.com";
					$correo->Password = "spadmin123";
					
					$correo->From = $responsable[0]->email; // Desde donde enviamos (Para mostrar)
					$correo->SetFrom("superadmin@informaticaldia.com", "Colegio XYZ");
					$correo->AddAddress($responsable[0]->email, $responsable[0]->nombre." ".$responsable[0]->apellido1." ".$responsable[0]->apellido2);
					$correo->Subject = utf8_decode($asunto); //Asunto
					
					//Cuerpo del Mensaje
					$correo->IsHTML(true);
					$correo->MsgHTML($html);
			
					$correo->CharSet = 'UTF-8';
					
					if(!$correo->Send()) {
						$estadocitares = "Hubo un error en el responsable ";
					} else {
						$estadocitares = "Notificaci&oacute;n enviada correctamente al responsable";
					};
				};
			}
			
			if(count($acudiente) != 0){
				if($acudiente[0]->notifica == "S"){
					$correo = new PHPMailer\PHPMailer();

                    //$correo->SMTPDebug = 1;
					$correo->IsSMTP();
					$correo->Host = "p3plcpnl0881.prod.phx3.secureserver.net";
					$correo->Port = 465;	
					$correo->SMTPSecure = "ssl";
					$correo->SMTPAuth = true;
					$correo->Username = "superadmin@informaticaldia.com";
					$correo->Password = "spadmin123";

					$correo->From = $acudiente[0]->email; // Desde donde enviamos (Para mostrar)
					$correo->SetFrom("superadmin@informaticaldia.com", "Colegio XYZ");
					$correo->AddAddress($acudiente[0]->email, $acudiente[0]->nombre." ".$acudiente[0]->apellido1." ".$acudiente[0]->apellido2);
					$correo->IsHTML(true);
					$correo->Subject = "Citaci&oacute;n entrevista colegio por la inscripci&oacute;n del estudiante "; //Asunto
					//Cuerpo del Mensaje
					$correo->MsgHTML($ArrDatos['obscitacion']);
					
					if(!$correo->Send()) {
						$estadocitaacu = "Hubo un error en el acudiente";
					} else {
						$estadocitaacu = "Notificaci&oacute;n enviada correctamente al acudiente";
					};
				};
			}else{
				$estadocitaacu = "";
			}				
		};
		
		if($ArrDatos['chaprob'] == "S" && $ArrDatos['obsaprobada'] != ""){
			if(count($responsable) != 0){
				if($responsable[0]->notifica == "S"){
					$correo = new PHPMailer\PHPMailer();

                    //$correo->SMTPDebug = 1;
					$correo->IsSMTP();
					$correo->Host = "p3plcpnl0881.prod.phx3.secureserver.net";
					$correo->Port = 465;	
					$correo->SMTPSecure = "ssl";
					$correo->SMTPAuth = true;
					$correo->Username = "superadmin@informaticaldia.com";
					$correo->Password = "spadmin123";

					$correo->From = $responsable[0]->email; // Desde donde enviamos (Para mostrar)
					$correo->SetFrom("superadmin@informaticaldia.com", "Colegio XYZ");
					$correo->AddAddress($responsable[0]->email, $responsable[0]->nombre." ".$responsable[0]->apellido1." ".$responsable[0]->apellido2);
					$correo->IsHTML(true);
					$correo->Subject = "Aprobaci&oacute;n de la inscripci&oacute;n del estudiante "; //Asunto
					//Cuerpo del Mensaje
					$correo->MsgHTML($ArrDatos['obsaprobada']);
					
					if(!$correo->Send()) {
						$estadoaprores = "Hubo un error en el responsable";
					} else {
						$estadoaprores = "Notificaci&oacute;n enviada correctamente al responsable";
					};
				};
			}
			
			if(count($acudiente) != 0){
				if($acudiente[0]->notifica == "S"){
					$correo = new PHPMailer\PHPMailer();

                    //$correo->SMTPDebug = 1;
					$correo->IsSMTP();
					$correo->Host = "p3plcpnl0881.prod.phx3.secureserver.net";
					$correo->Port = 465;	
					$correo->SMTPSecure = "ssl";
					$correo->SMTPAuth = true;
					$correo->Username = "superadmin@informaticaldia.com";
					$correo->Password = "spadmin123";

					$correo->From = $acudiente[0]->email; // Desde donde enviamos (Para mostrar)
					$correo->SetFrom("superadmin@informaticaldia.com", "Colegio XYZ");
					$correo->AddAddress($acudiente[0]->email, $acudiente[0]->nombre." ".$acudiente[0]->apellido1." ".$acudiente[0]->apellido2);
					$correo->IsHTML(true);
					$correo->Subject = "Aprobaci&oacute;n de la inscripción del estudiante "; //Asunto
					//Cuerpo del Mensaje
					$correo->MsgHTML($ArrDatos['obscitacion']."Los datos para el acceso del estudiante son: ");
					
					if(!$correo->Send()) {
						$estadoaproacu = "Hubo un error en el acudiente";
					} else {
						$estadoaproacu = "Notificaci&oacute;n enviada correctamente al acudiente";
					};
				};
			}else{
				$estadocitaacu = "";
			}				
		};		
		/* ************************ */
		
		$Respuesta = array($inscrip,"Inscripción actualizada correctamente", $estadocitares, $estadocitaacu, $estadoaprores, $estadoaproacu);
		return response()->json($Respuesta);
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
		$generos = DB::table('generos')->get();
		$tipodocumentos = DB::table('tipodocumentos')->get();
		$profesiones = DB::table('profesiones')->get();
		$especialidades = DB::table('especialidades')->get();
		$estcivil = DB::table('estcivil')->get();
		
		return view('admin.incripciones.create', ['ciudades' => ($ciudades),'paises' => ($paises),'sedes' => ($sedes),'grados' => ($grados),
		'jornadas' => ($jornadas),'etnias' => ($etnias),'eps' => ($eps),'prepagadas' => ($prepagadas),'religiones' => ($religiones),
		'aseguradoras' => ($aseguradoras),'barrios' => ($barrios), 'generos' => ($generos),'tipodocumentos' => ($tipodocumentos),
		'profesiones' => ($profesiones),'especialidades' => ($especialidades),'estcivil' => ($estcivil)]);
    }
	
    public function editarficha($codest)
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
		$generos = DB::table('generos')->get();
		$tipodocumentos = DB::table('tipodocumentos')->get();
		$profesiones = DB::table('profesiones')->get();
		$especialidades = DB::table('especialidades')->get();
		$estcivil = DB::table('estcivil')->get();
		
		$estudiante = DB::table('estudiantes')->where('numdocumento', '=', $codest)->get();
		$responsable = DB::table('responsables')->where('cod_estudiante', '=', $codest)->where('cod_rol', '=', '04')->get();
		$acudiente = DB::table('responsables')->where('cod_estudiante', '=', $codest)->where('cod_rol', '=', '05')->get();
		
		$tpsangre = ["codigo"=>["O+","O-","B+","B-","AB+","AB-"],"nombre"=>["O+","O-","B+","B-","AB+","AB-"]];
		
		return view('admin.incripciones.ficha', ['ciudades' => ($ciudades),'paises' => ($paises),'sedes' => ($sedes),'grados' => ($grados),
		'jornadas' => ($jornadas),'etnias' => ($etnias),'eps' => ($eps),'prepagadas' => ($prepagadas),'religiones' => ($religiones),
		'aseguradoras' => ($aseguradoras),'barrios' => ($barrios), 'generos' => ($generos),'tipodocumentos' => ($tipodocumentos),
		'profesiones' => ($profesiones),'especialidades' => ($especialidades),'estcivil' => ($estcivil),'estudiante' => ($estudiante),
		'responsable' => ($responsable),'acudiente' => ($acudiente),'tpsangre' => ($tpsangre)]);
    }	

    public function validarEstudiante(Request $request)
    {
		$ArrDatos = $_GET["ArrDatos"];
		
		$VerExist = DB::table('estudiantes')->where('numdocumento', '=', $ArrDatos['numdocumento'])->exists();
		if($VerExist == true){
			$Respuesta = array("0", "El estudiante con numero de documento ".$ArrDatos['numdocumento'].",ya existe, ¿Desea actualizar la informaciòn?");			
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
			'nomcomple' => $ArrDatos['nombre']." ".$ArrDatos['apellido1']." ".$ArrDatos['apellido2'],
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
			'otra_eps' => $ArrDatos['otra_eps'],
			'otra_prepagada' => $ArrDatos['otra_prepagada'],
			'otra_asegurador' => $ArrDatos['otra_asegurador'],
			'otra_religion' => $ArrDatos['otra_religion'],
			'observacion' => $ArrDatos['obsporque'],
			'nuevo' => 'S',
			'cod_usuario' => $usuario,
			'cod_rol' => '03' //Rol estudiante
			]);
			
			$user = DB::table('users')->insert([
			'name' => strtolower($ArrDatos['nombre'])." ".strtolower($ArrDatos['apellido1'])." ".strtolower($ArrDatos['apellido2']),
			'email' => $usuario,
			'password' => bcrypt('secret'),
			'estado' => '0',
			'cod_rol' => '03' //Rol estudiante
			]);
				
			$Respuesta = array($estudiante, "Estudiante agregado corectamente", $codigoEst, $usuario);
			return response()->json($Respuesta);			
		}
    }
	
	public function actualizarEstudiante(Request $request)
    {
		$ArrDatos = $_GET["ArrDatos"];
		$Exist = DB::table('estudiantes')->where('numdocumento', '=', $ArrDatos['numdocumento'])->exists();
		if($Exist == true){
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
			
			$nom1 = DB::table('estudiantes')->where('numdocumento', '=', $ArrDatos['numdocumento'])->get();
			
			$UdpEstu = DB::table('estudiantes')->where('numdocumento', '=', $ArrDatos['numdocumento'])->update([
			'tipodocumento' => $ArrDatos['tipdocu'],
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
			'otra_eps' => $ArrDatos['otra_eps'],
			'otra_prepagada' => $ArrDatos['otra_prepagada'],
			'otra_asegurador' => $ArrDatos['otra_asegurador'],
			'otra_religion' => $ArrDatos['otra_religion'],
			'observacion' => $ArrDatos['obsporque'],
			'cod_usuario' => $usuario,
			]);
			
			$nombre = strtolower($nom1[0]->nombre)." ".strtolower($nom1[0]->apellido1)." ".strtolower($nom1[0]->apellido2);
			$udpUser = DB::table('users')->where('name', '=', $nombre)->update([
				'name' => strtolower($ArrDatos['nombre'])." ".strtolower($ArrDatos['apellido1'])." ".strtolower($ArrDatos['apellido2']),
				'email' => $usuario,
			]);			
			
			$Respuesta = array($UdpEstu, "Estudiante actualizado correctamente.",$nombre);			
			return response()->json($Respuesta);
		}		
	}

    public function validarResponsable(Request $request)
    {
		$ArrDatos = $_GET["ArrDatos"];
		$VerExist = DB::table('responsables')->where('numdocumento', '=', $ArrDatos['numdocures'])->exists();
		if($VerExist == true){
			$Respuesta = array("0", "El responsable con numero de documento ".$ArrDatos['numdocures'].",ya existe, ¿Desea actualizar la informaciòn?");			
			return response()->json($Respuesta);
		}else{		
		
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
			'nomcomple' => $ArrDatos['nomres']." ".$ArrDatos['apelres1']." ".$ArrDatos['apelres2'],
			'cod_pais_nace' => $ArrDatos['painaceres'],			
			'cod_estcivi' => $ArrDatos['tipestciv'],
			'direccion' => $ArrDatos['direcres'],
			'numtelefono' => $ArrDatos['fijores'],
			'numcelular' => $ArrDatos['celures'],
			'email' => $ArrDatos['mailres'],
			'cod_profesion' => $ArrDatos['proferes'],
			'cod_especialidad' => $ArrDatos['esperes'],
			'empresa' => $ArrDatos['empreres'],
			'cargo' => $ArrDatos['cargres'],
			'dirempresa' => $ArrDatos['dirempres'],
			'telempresa' => $ArrDatos['telempres'],
			'exalumno' => $ArrDatos['exalumres'],
			'notifica' => $ArrDatos['notires'],
			'otra_profesion' => $ArrDatos['otproferes'],
			'otra_especialidad' => $ArrDatos['otesperes'],
			'cod_rol' => '04', //Rol responsable
			'cod_estudiante' => $ArrDatos['codigoest']
			]);
			
			$user = DB::table('users')->insert([
			'name' => strtolower($ArrDatos['nomres'])." ".strtolower($ArrDatos['apelres1'])." ".strtolower($ArrDatos['apelres2']),
			'email' => $usuario,
			'password' => bcrypt('secret'),
			'estado' => '0',
			'cod_rol' => '04'  //Rol responsable
			]);
			$Respuesta = array($responsable, "Responsable agregado corectamente", $usuario);
			return response()->json($Respuesta);
		}
    }
	
	public function actualizarResponsable(Request $request)
    {
		$ArrDatos = $_GET["ArrDatos"];
		$Exist = DB::table('responsables')->where('numdocumento', '=', $ArrDatos['numdocures'])->exists();
		if($Exist == true){
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
			
			$nom1 = DB::table('responsables')->where('numdocumento', '=', $ArrDatos['numdocures'])->get();
			
			$UdpEstu = DB::table('responsables')->where('numdocumento', '=', $ArrDatos['numdocures'])->update([
				'tipodocumento' => $ArrDatos['tipdocures'],
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
				'cod_especialidad' => $ArrDatos['esperes'],
				'empresa' => $ArrDatos['empreres'],
				'cargo' => $ArrDatos['cargres'],
				'dirempresa' => $ArrDatos['dirempres'],
				'telempresa' => $ArrDatos['telempres'],
				'exalumno' => $ArrDatos['exalumres'],
				'notifica' => $ArrDatos['notires'],
				'otra_profesion' => $ArrDatos['otproferes'],
				'otra_especialidad' => $ArrDatos['otesperes']
			]);
			
			$nombre = strtolower($nom1[0]->nombre)." ".strtolower($nom1[0]->apellido1)." ".strtolower($nom1[0]->apellido2);
			$udpUser = DB::table('users')->where('name', '=', $nombre)->update([
				'name' => strtolower($ArrDatos['nomres'])." ".strtolower($ArrDatos['apelres1'])." ".strtolower($ArrDatos['apelres2']),
				'email' => $usuario,
			]);			
			
			$Respuesta = array($UdpEstu, "Responsable actualizado correctamente.",$nombre);			
			return response()->json($Respuesta);
		}		
	}

    public function validarAcudiente(Request $request)
    {
		$ArrDatos = $_GET["ArrDatos"];
		
		$VerExist = DB::table('responsables')->where('numdocumento', '=', $ArrDatos['numdocuacu'])->exists();
		if($VerExist == true){
			$Respuesta = array("0", "El acudiente con numero de documento ".$ArrDatos['numdocuacu'].",ya existe, ¿Desea actualizar la informaciòn?");			
			return response()->json($Respuesta);
		}else{		
			$usuario = strtolower($ArrDatos['nomacu'])."_".strtolower($ArrDatos['apelacu1'])."@tw.com";
			$ExtUsu = DB::table('users')->where('email', '=', $usuario)->exists();
			
			if($ExtUsu == true){
				$usuario = "";
				$usuario = strtolower($ArrDatos['nomacu'])."_".strtolower($ArrDatos['apelacu1'])."_".strtolower($ArrDatos['apelacu2'])."@tw.com";
				$ExtUsu2 = DB::table('users')->where('email', '=', $usuario)->exists();
				
				if($ExtUsu2 == true){
					$usuario = strtolower($ArrDatos['nomacu'])."_".strtolower($ArrDatos['apelacu2'])."@tw.com";
					$ExtUsu3 = DB::table('users')->where('email', '=', $usuario)->exists();
					
					if($ExtUsu3 == true){
						$usuario = strtolower($ArrDatos['nomacu'])."_".substr(str_shuffle("0123456789"), 0, 4)."@tw.com";
					}
				}
			}
			
			$acudiente = DB::table('responsables')->insert([
			'tipodocumento' => $ArrDatos['tipdocuacu'],
			'numdocumento' => $ArrDatos['numdocuacu'],
			'nombre' => $ArrDatos['nomacu'],
			'apellido1' => $ArrDatos['apelacu1'],
			'apellido2' => $ArrDatos['apelacu2'],
			'nomcomple' => $ArrDatos['nomacu']." ".$ArrDatos['apelacu1']." ".$ArrDatos['apelacu2'],
			'cod_pais_nace' => $ArrDatos['painaceacu'],			
			'cod_estcivi' => $ArrDatos['tipestciv'],
			'direccion' => $ArrDatos['direcacu'],
			'numtelefono' => $ArrDatos['fijoacu'],
			'numcelular' => $ArrDatos['celuacu'],
			'email' => $ArrDatos['mailacu'],
			'cod_profesion' => $ArrDatos['profeacu'],
			'cod_especialidad' => $ArrDatos['espeacu'],
			'empresa' => $ArrDatos['empreacu'],
			'cargo' => $ArrDatos['cargacu'],
			'dirempresa' => $ArrDatos['dirempacu'],
			'telempresa' => $ArrDatos['telempacu'],
			'exalumno' => $ArrDatos['exalumacu'],
			'notifica' => $ArrDatos['notiacu'],
			'otra_profesion' => $ArrDatos['otprofeacu'],
			'otra_especialidad' => $ArrDatos['otespeacu'],		
			'cod_rol' => '05', //Rol acudiente
			'cod_estudiante' => $ArrDatos['codigoest']
			]);
			
			$user = DB::table('users')->insert([
			'name' => strtolower($ArrDatos['nomacu'])." ".strtolower($ArrDatos['apelacu1'])." ".strtolower($ArrDatos['apelacu2']),
			'email' => $usuario,
			'password' => bcrypt('secret'),
			'estado' => '0',
			'cod_rol' => '05'  //Rol acudiente
			]);
			
			$Respuesta = array($acudiente, "Acudiente agregado corectamente", $usuario);
			return response()->json($Respuesta);
		}
    }
	
	public function actualizarAcudiente(Request $request)
    {
		$ArrDatos = $_GET["ArrDatos"];
		$Exist = DB::table('responsables')->where('numdocumento', '=', $ArrDatos['numdocuacu'])->exists();
		if($Exist == true){
			$usuario = strtolower($ArrDatos['nomacu'])."_".strtolower($ArrDatos['apelacu1'])."@tw.com";
			$ExtUsu = DB::table('users')->where('email', '=', $usuario)->exists();
			
			if($ExtUsu == true){
				$usuario = "";
				$usuario = strtolower($ArrDatos['nomacu'])."_".strtolower($ArrDatos['apelacu1'])."_".strtolower($ArrDatos['apelacu2'])."@tw.com";
				$ExtUsu2 = DB::table('users')->where('email', '=', $usuario)->exists();
				
				if($ExtUsu2 == true){
					$usuario = strtolower($ArrDatos['nomacu'])."_".strtolower($ArrDatos['apelacu2'])."@tw.com";
					$ExtUsu3 = DB::table('users')->where('email', '=', $usuario)->exists();
					
					if($ExtUsu3 == true){
						$usuario = strtolower($ArrDatos['nomacu'])."_".substr(str_shuffle("0123456789"), 0, 4)."@tw.com";
					}
				}
			}
			
			$nom1 = DB::table('responsables')->where('numdocumento', '=', $ArrDatos['numdocuacu'])->get();
			
			$UdpEstu = DB::table('responsables')->where('numdocumento', '=', $ArrDatos['numdocuacu'])->update([
				'tipodocumento' => $ArrDatos['tipdocuacu'],
				'nombre' => $ArrDatos['nomacu'],
				'apellido1' => $ArrDatos['apelacu1'],
				'apellido2' => $ArrDatos['apelacu2'],
				'cod_pais_nace' => $ArrDatos['painaceacu'],			
				'cod_estcivi' => $ArrDatos['tipestciv'],
				'direccion' => $ArrDatos['direcacu'],
				'numtelefono' => $ArrDatos['fijoacu'],
				'numcelular' => $ArrDatos['celuacu'],
				'email' => $ArrDatos['mailacu'],
				'cod_profesion' => $ArrDatos['profeacu'],
				'cod_especialidad' => $ArrDatos['espeacu'],
				'empresa' => $ArrDatos['empreacu'],
				'cargo' => $ArrDatos['cargacu'],
				'dirempresa' => $ArrDatos['dirempacu'],
				'telempresa' => $ArrDatos['telempacu'],
				'exalumno' => $ArrDatos['exalumacu'],
				'notifica' => $ArrDatos['notiacu'],
				'otra_profesion' => $ArrDatos['otprofeacu'],
				'otra_especialidad' => $ArrDatos['otespeacu']
			]);
			
			$nombre = strtolower($nom1[0]->nombre)." ".strtolower($nom1[0]->apellido1)." ".strtolower($nom1[0]->apellido2);
			$udpUser = DB::table('users')->where('name', '=', $nombre)->update([
				'name' => strtolower($ArrDatos['nomacu'])." ".strtolower($ArrDatos['apelacu1'])." ".strtolower($ArrDatos['apelacu2']),
				'email' => $usuario,
			]);			
			
			$Respuesta = array($UdpEstu, "Acudiente actualizado correctamente.",$nombre);			
			return response()->json($Respuesta);
		}		
	}	
	
    public function devolverCambios()
    {
		$ArrDatos = $_GET["ArrDatos"];
		
		$estudiante = DB::table('estudiantes')->where('codigo_est', '=', $ArrDatos['codigoest'])->where('numdocumento', '=', $ArrDatos['numdocest'])->delete();
		$responsable = DB::table('responsables')->where('numdocumento', '=', $ArrDatos['numdocres'])->where('cod_estudiante', '=', $ArrDatos['codigoest'])->delete();
		$acudiente = DB::table('responsables')->where('numdocumento', '=', $ArrDatos['numdocacu'])->where('cod_estudiante', '=', $ArrDatos['codigoest'])->delete();
		$inscrip = DB::table('inscripciones')->where('numdocest', '=', $ArrDatos['numdocest'])->delete();
		
		$usrest = DB::table('users')->where('email', '=', $ArrDatos['usuest'])->delete();
		$usrest = DB::table('users')->where('email', '=', $ArrDatos['usures'])->delete();
		$usrest = DB::table('users')->where('email', '=', $ArrDatos['usuacu'])->delete();
		
		$Respuesta = [$estudiante,$responsable,$acudiente,$usrest,$usrest,$usrest,$inscrip];
		
		return response()->json($Respuesta);
	}
	
    public function obtenerListadoInscripciones(Request $request){
		if($request->input('sede') != ""){
			
			$cod_sede = $request->input('sede');
			$inscripcion = DB::table('inscripciones')->where('sede', 'like', '%'.$cod_sede.'%')->paginate(20);
			
		}else if($request->input('codigo') != ""){
			
			$estudiante = $request->input('codigo');
			$cod_estudiante = DB::table('estudiantes')->where('nomcomple', 'like', '%'.$estudiante.'%')->get();
			$inscripcion = DB::table('inscripciones')->where('numdocest', 'like', '%'.$cod_estudiante[0]->numdocumento.'%')->paginate(20);
			
		}else{
			$inscripcion = DB::table('inscripciones')->paginate(20);
		}
		
		$estu = DB::table('estudiantes')->get();
		
        return response()->json(['inscripcion'=>$inscripcion,'estu'=>$estu, 'paginate' => [
                'total'         =>  $inscripcion->total(),
                'current_page'  =>  $inscripcion->currentPage(),
                'per_page'      =>  $inscripcion->perPage(),
                'last_page'     =>  $inscripcion->lastPage(),
                'from '         =>  $inscripcion->firstItem(),
                'to'            =>  $inscripcion->lastPage()],
				]);		
    }
	
	public function pdfInscripcion($codest){
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
		$generos = DB::table('generos')->get();
		$tipodocumentos = DB::table('tipodocumentos')->get();
		$profesiones = DB::table('profesiones')->get();
		$especialidades = DB::table('especialidades')->get();
		$estcivil = DB::table('estcivil')->get();
		
		$estudiante = DB::table('estudiantes')->where('numdocumento', '=', $codest)->get();
		$responsable = DB::table('responsables')->where('cod_estudiante', '=', $codest)->where('cod_rol', '=', '04')->get();
		$acudiente = DB::table('responsables')->where('cod_estudiante', '=', $codest)->where('cod_rol', '=', '05')->get();
		
		$pdf = PDF::loadView('admin.reportes.reporte', [
		'estudiante' => ($estudiante),
		'responsable' => ($responsable),
		'acudiente' => ($acudiente),
		'ciudades' => ($ciudades),
		'barrios' => ($barrios),
		'paises' => ($paises),
		'sedes' => ($sedes),
		'grados' => ($grados),
		'jornadas' => ($jornadas),
		'etnias' => ($etnias),
		'eps' => ($eps),
		'prepagadas' => ($prepagadas),
		'religiones' => ($religiones),
		'aseguradoras' => ($aseguradoras),
		'generos' => ($generos),
		'tipodocumentos' => ($tipodocumentos),
		'profesiones' => ($profesiones),
		'especialidades' => ($especialidades),
		'estcivil' => ($estcivil)
		])->setPaper('a4', 'landscape');
        return $pdf->stream('Reporte Inscripción '.strtoupper($estudiante[0]->nombre).'_'.strtoupper($estudiante[0]->apellido1).'.pdf');
		//return view('admin.reportes.reporte', ['estudiante' => ($estudiante),'responsable' => ($responsable),'acudiente' => ($acudiente)]);
	}
	
	public function generarPago($codest){		
		$hoy = getdate();
		$año = $hoy['year'];
		$codcolegio = '98765423-1';
		
		$estudiante = DB::table('estudiantes')->where('numdocumento', '=', $codest)->get();
		$concepto = DB::table('conceptoscobro')->where('concept_cod', '=', '01')->where('year', '=', $año)->get();
		$colegio = DB::table('colegios')->where('cod_colegio', '=', $codcolegio)->get();
		$grados = DB::table('grados')->get();
		
		$pdf = PDF::loadView('admin.reportes.pagoInscripcion', [
		'estudiante' => ($estudiante),
		'concepto' => ($concepto),
		'colegio' => ($colegio),
		'grados' => ($grados)
		])->setPaper('a4', 'landscape');
		
		return $pdf->stream('Pago Inscripción '.strtoupper($estudiante[0]->nombre).'_'.strtoupper($estudiante[0]->apellido1).'.pdf');
		//return $pdf->download('Pago Inscripción '.strtoupper($estudiante[0]->nombre).'_'.strtoupper($estudiante[0]->apellido1).'.pdf');
	}
	
	public function terminarInscripcion(){
		$ArrDatos = $_GET["ArrDatos"];
		
		$codbdIns = DB::table('inscripciones')->select('codigo')->orderBy('codigo', 'desc')->get();
		if(count($codbdIns) == 0){
			$codigoIns = '00000000';
		}else{
			$codigoIns = $codbdIns[0]->codigo + 1;
		}
		
		$hoy = getdate();
		$fechaIns = $hoy['year']."/".$hoy['mon']."/".$hoy['mday'];
		
		$inscripcion = DB::table('inscripciones')->insert([
			'codigo' => $codigoIns,
			'fechainscrip' => $fechaIns,
			'sede' => $ArrDatos['sede'],
			'numdocest' => $ArrDatos['numdocumento'],
			'verificada' => 'N',
			'citacion' => 'N',
			'aprobada' => 'N'
		]);
		
		return response()->json($inscripcion);		
	}
}