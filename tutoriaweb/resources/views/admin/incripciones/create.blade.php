@extends('layouts.main')

@section('content')	
<div class="column is-12">

	<input type="radio" id="estudiante" name="nav-tab" onclick="ChEstudiante()" checked>
	<input type="radio" id="responsable" name="nav-tab" onclick="ChResponsable()" disabled>
	<input type="radio" id="acudiente" name="nav-tab" onclick="ChAcudiente()" >

	<div class="tabs is-boxed" style="margin-bottom: 0px;">
		<ul>
			<li class="is-active" id="liEst">
				<a><label for="estudiante" >Estudiante</label></a>
			</li>
			<li id="liRespo">
				<a><label for="responsable" >Responsable</label></a>
			</li>
			<li id="liAcu">
				<a><label for="acudiente" >Acudiente</label></a>
			</li>
		</ul>
	</div>
		<!-- ESTUDIANTE -->
		<div class="tab-content">
			<div class="tab-pane content-estudiante">
				<form class="long-form">				
					<div class="columns">
						<div class="column is-one-fifth">
							<label class="label">Nombre</label>
							<input type="text" name="name" id="nombre" onBlur="this.value=this.value.toUpperCase();" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrNombre" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth">
							<label class="label">Primer apellido</label>
							<input type="text" name="apellido1" id="apellido1" class="input {{ $errors->has('apellido1') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrApellido1" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth">
							<label class="label">Segundo apellido</label>
							<input type="text" name="apellido2" id="apellido2" class="input {{ $errors->has('apellido2') ? ' is-danger' : '' }}" >
						</div>

						<div class="column is-one-fifth" style="width: 155px">
							<label class="label">Género</label>
							<div class="select">
								<select name="tipgenero" id="tipgenero">
									<option value="">Seleccione</option>
									@foreach($generos->all() as $genero)
										<option value="{{ $genero->codigo }}">{{ $genero->nombre }}</option>
									@endforeach
								</select>
							</div>
							<p class="help is-danger" id="ErrGenero" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth" style="width: 205px;">
							<label class="label">Tipo Documento</label>
							<div class="select">
								<select name="tipdocu" id="tipdocu">
									<option value="">Seleccione</option>
									@foreach($tipodocumentos->all() as $tpdocu)
										<option value="{{ $tpdocu->codigo }}">{{ $tpdocu->nombre }}</option>
									@endforeach
								</select>
							</div>
							<p class="help is-danger" id="ErrTipdocu" hidden>Campo obligatorio *</p>							
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Documento</label>
							<input type="number" name="numdocu" id="numdocu" style="width: 113px;" class="input {{ $errors->has('numdocu') ? ' is-danger' : '' }}" onchange="ColoqueRecibo()">
							<p class="help is-danger" id="ErrNumdocu" hidden>Campo obligatorio *</p>
						</div>						
					</div>

					<div class="columns">									
						<div class="column is-one-fifth">
							<label class="label">Dirección</label>
							<input type="text" name="direccion" id="direccion" class="input {{ $errors->has('direccion') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrDirecc" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth" style="width: 155px;">
							<label class="label">Barrio</label>
							<div class="select">
								<select name="barrio" id="barrio">
									<option value="">Seleccione</option>
									@foreach($barrios->all() as $barrio)
										<option value="{{ $barrio->cod_ciudad }}">{{ $barrio->nombre }}</option>
									@endforeach							
								</select>
							</div>
							<p class="help is-danger" id="ErrBarrio" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth" style="width: 157px">
							<label class="label"># Teléfono</label>
							<input type="number" name="numfijo" id="numfijo" class="input {{ $errors->has('numfijo') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrNumtel" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth" style="width: 157px">
							<label class="label"># Celular</label>
							<input type="number" name="numcelular" id="numcelular" class="input {{ $errors->has('numcelular') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrNumcel" hidden>Campo obligatorio *</p>
						</div>	

						<div class="column is-one-quarter">
							<label class="label">Correo electrónico</label>
							<input type="email" id="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" onchange="ValEmail();">
							<p class="help is-danger" id="ErrMailEstu" hidden>Debe digitar un e-mail valido *</p>
						</div>

						<div class="column is-one-fifth" style="width: 190px">
							<label class="label">Fecha nacimiento</label>
							<input type="date" id="fecnaci" class="input {{ $errors->has('fecnaci') ? ' is-danger' : '' }}" max="<?php echo date('Y-m-d');?>">
							<p class="help is-danger" id="ErrFecnace" hidden>Campo obligatorio *</p>
						</div>						
					</div>
				
					<div class="columns">
						<div class="column is-one-fifth" >
							<label class="label">País nacimiento</label>
							<input type="text" name="painace" id="painace" attr-value="CO" value="Colombia" class="input {{ $errors->has('painace') ? ' is-danger' : '' }}">
							<p class="help is-danger" id="ErrPainace" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Ciudad nacimiento</label>
							<input type="text" name="ciunace" id="ciunace" attr-value="01" value="Cali" class="input {{ $errors->has('ciunace') ? ' is-danger' : '' }}">
							<p class="help is-danger" id="ErrCiunace" hidden>Campo obligatorio *</p>
						</div>	

						<div class="column is-one-fifth" style="margin-right: 25px; width: 125px">
							<label class="label">RH</label>
							<div class="select">
								<select name="tiprh" id="tiprh">
									<option value="">Sel</option>
									<option value="O+">O+</option>
									<option value="O-">O-</option>
									<option value="A+">A+</option>
									<option value="A-">A-</option>
									<option value="B+">B+</option>
									<option value="B-">B-</option>
									<option value="AB+">AB+</option>
									<option value="AB-">AB-</option>
								</select>
							</div>
							<p class="help is-danger" id="ErrTiprh" hidden>Obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth" style="width: 216px">
							<label class="label">Sede</label>
							<div class="select">
								<select name="sede" id="sede">
									<option value="">Seleccione</option>
									@foreach($sedes->all() as $sede)
										<option value="{{ $sede->codigo }}">{{ $sede->nombre }}</option>
									@endforeach							
								</select>
							</div>
							<p class="help is-danger" id="ErrSede" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth" style="width: 154px">
							<label class="label">Grado</label>
							<div class="select">
								<select name="grado" id="grado">
									<option value="">Sel</option>
									@foreach($grados->all() as $grado)
										<option value="{{ $grado->codigo }}">{{ $grado->nombre }}</option>
									@endforeach							
								</select>
							</div>
							<p class="help is-danger" id="ErrGrado" hidden>Obligatorio *</p>
						</div>

						<div class="column is-one-fifth">
							<label class="label">Jornada</label>
							<div class="select">
								<select name="jornada" id="jornada" style="width: 170px">
									<option value="">Seleccione</option>
									@foreach($jornadas->all() as $jornada)
										<option value="{{ $jornada->codigo }}">{{ $jornada->nombre }}</option>
									@endforeach							
								</select>
							</div>
							<p class="help is-danger" id="ErrJornada" hidden>Campo obligatorio *</p>
						</div>
					</div>
					
					<div class="columns">
						<div class="column is-one-fifth">
							<label class="label">Etnia</label>
							<div class="select">
								<select name="etnia" id="etnia">
									<option value="">Seleccione</option>
									@foreach($etnias->all() as $etnia)
										<option value="{{ $etnia->codigo }}">{{ $etnia->nombre }}</option>
									@endforeach							
								</select>
							</div>
							<p class="help is-danger" id="ErrEtnia" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth" style="margin-left: 24px; width: 80px">
							<label class="label">Sisben</label>
							<input type="checkbox" id="checksisben" style="margin-left: 28px;" onclick="ValidaSisben()">
						</div>
						
						<div class="column is-one-fifth" style="width: 112px">
							<label class="label">Nivel</label>
							<div class="select">
								<select name="sisnvl" id="sisnvl">
									<option value="">Sel</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
							</div>
							<p class="help is-danger" id="ErrSisnvl" hidden>Obligatorio *</p>
						</div>
					
						<div class="column is-one-fifth" style="width: 150px">
							<label class="label">EPS</label>
							<div class="select">
								<select name="eps" id="eps" onchange="ValidaOtEps();">
									<option value="">Seleccione</option>
									@foreach($eps->all() as $ep)
										<option value="{{ $ep->codigo }}">{{ $ep->nombre }}</option>
									@endforeach							
								</select>
							</div>
							<p class="help is-danger" id="ErrEps" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">&nbsp;</label>
							<input type="text" name="oteps" id="oteps" class="input {{ $errors->has('ciunace') ? ' is-danger' : '' }}">
							<p class="help is-danger" id="Erroteps" hidden>Campo obligatorio *</p>
						</div>						
						
						<div class="column is-one-fifth" style="width: 150px">
							<label class="label">Prepagada</label>
							<div class="select">
								<select name="prepagada" id="prepagada" onchange="ValidaOtPrepagada();">
									<option value="">Ninguna</option>
									@foreach($prepagadas->all() as $prepagada)
										<option value="{{ $prepagada->codigo }}">{{ $prepagada->nombre }}</option>
									@endforeach							
								</select>
							</div>						
						</div>
						
						<div class="column is-one-fifth" style="width: 200px">
							<label class="label">&nbsp;</label>
							<input type="text" name="otprepagada" id="otprepagada" class="input {{ $errors->has('ciunace') ? ' is-danger' : '' }}">
							<p class="help is-danger" id="Errotprepagada" hidden>Campo obligatorio *</p>
						</div>						
					</div>
					
					<div class="columns">
						<div class="column is-one-fifth">
							<label class="label">Seguro vida</label>
							<input type="checkbox" id="segvida" style="margin-left: 43px;" onclick="ValidaSegVida()">
						</div>
						
						<div class="column is-one-fifth" style="width: 215px">
							<label class="label">Aseguradora</label>
							<div class="select">
								<select name="aseguradora" id="aseguradora" onchange="ValidaOtAsegura();">
									<option value="">Ninguno</option>
									@foreach($aseguradoras->all() as $aseguradora)
										<option value="{{ $aseguradora->codigo }}">{{ $aseguradora->nombre }}</option>
									@endforeach
								</select>
							</div>
							<p class="help is-danger" id="ErrAsegura" hidden>Campo obligatorio *</p>							
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">&nbsp;</label>
							<input type="text" name="otaseguradora" id="otaseguradora" class="input {{ $errors->has('ciunace') ? ' is-danger' : '' }}">
							<p class="help is-danger" id="Errotaseguradora" hidden>Campo obligatorio *</p>
						</div>						
						
						<div class="column is-one-fifth" style="width: 150px">
							<label class="label">Religión</label>
							<div class="select">
								<select name="religion" id="religion" onchange="ValidaOtReli();">
									<option value="">Ninguna</option>
									@foreach($religiones->all() as $religion)
										<option value="{{ $religion->codigo }}">{{ $religion->nombre }}</option>
									@endforeach							
								</select>
							</div>
							<p class="help is-danger" id="ErrReligion" hidden>Campo obligatorio *</p>						
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">&nbsp;</label>
							<input type="text" name="otreligion" id="otreligion" class="input {{ $errors->has('ciunace') ? ' is-danger' : '' }}">
							<p class="help is-danger" id="Errotreligion" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth">
							<label class="label">Tiene cobertura?</label>
							<input type="checkbox" id="cobertura" style="margin-left: 65px;">
						</div>
					</div>
					
					<div class="columns">
						<div class="column is-one-fifth">
							<label class="label">Colegio procedencia</label>
							<input type="text" name="colproce" id="colproce" class="input {{ $errors->has('colproce') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrColproce" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Ciudad colegio procedencia</label>
							<input type="text" name="ciuproce" id="ciuproce" attr-value="01" value="Cali" class="input {{ $errors->has('ciuproce') ? ' is-danger' : '' }}">
							<p class="help is-danger" id="ErrCiuproce" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth" style="margin-left: 47px; width: 168px">
							<label class="label">Es desplazado?</label>
							<input type="checkbox" id="desplaza" style="margin-left: 52px;">						
						</div>						
						
						<div class="column is-two-thirds" style="width: 502px">
							<p align="left" class="help is-info">&nbsp;&nbsp;&nbsp;&nbsp;Explique brevemente porqué el estudiante sale del colegio anterior y desea ingresar a &nbsp;&nbsp;&nbsp;&nbsp;nuestra institución. *</p>
							<textarea class="textarea has-fixed-size" id="obsporque"></textarea>
							<p class="help is-danger" id="Errobsporque" hidden>Campo obligatorio *</p>
						</div>						
					</div>					
					<hr>
					<a class="button is-link is-medium is-outlined" onclick="GuardarEstudiante()">Guardar</a>
					<a class="button is-link is-medium is-outlined" onclick="DevolverCambios()">Cancelar</a>
				</form>
			</div>
			
			<!-- RESPONSABLE -->
			
			<div class="tab-pane content-responsable">
				<form class="long-form">				
					<div class="columns">
						<div class="column is-one-fifth">
							<label class="label">Nombre</label>
							<input type="text" name="name" id="nomres" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrNomres" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth">
							<label class="label">Primer apellido</label>
							<input type="text" name="apelres1" id="apelres1" class="input {{ $errors->has('apelres1') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrApelres1" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth">
							<label class="label">Segundo apellido</label>
							<input type="text" name="apelres2" id="apelres2" class="input {{ $errors->has('apellido2') ? ' is-danger' : '' }}" >
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Tipo Documento</label>
							<div class="select">
								<select name="tipdocures" id="tipdocures">
									<option value="">Seleccione</option>
									@foreach($tipodocumentos->all() as $tpdocu)
										<option value="{{ $tpdocu->codigo }}">{{ $tpdocu->nombre }}</option>
									@endforeach
								</select>
							</div>
							<p class="help is-danger" id="ErrTDres" hidden>Campo obligatorio *</p>							
						</div>
						
						<div class="column is-one-fifth">
							<label class="label"># Documento</label>
							<input type="number" name="numdocures" id="numdocures" class="input {{ $errors->has('numdocu') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrNumdocures" hidden>Campo obligatorio *</p>
						</div>
					</div>
					
					<div class="columns">
						<div class="column is-one-fifth">
							<label class="label">Estado civil</label>
							<div class="select">
								<select name="tipestciv" id="tipestciv">
									<option value="">Seleccione</option>
									@foreach($estcivil->all() as $estciv)
										<option value="{{ $estciv->codigo }}">{{ $estciv->nombre }}</option>
									@endforeach
								</select>
							</div>
							<p class="help is-danger" id="ErrTPestciv" hidden>Campo obligatorio *</p>							
						</div>
						
						<div class="column is-one-fifth" >
							<label class="label">País nacimiento</label>
							<input type="text" name="painaceres" id="painaceres" attr-value="CO" value="Colombia" class="input {{ $errors->has('painaceres') ? ' is-danger' : '' }}">
							<p class="help is-danger" id="ErrPainaceres" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Dirección</label>
							<input type="text" name="direcres" id="direcres" class="input {{ $errors->has('direcres') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrDirecres" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth">
							<label class="label"># Teléfono</label>
							<input type="number" name="fijores" id="fijores" class="input {{ $errors->has('fijores') ? ' is-danger' : '' }}" >
						</div>

						<div class="column is-one-fifth">
							<label class="label"># Celular</label>
							<input type="number" name="celures" id="celures" class="input {{ $errors->has('celures') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrCelures" hidden>Campo obligatorio *</p>
						</div>					
					</div>
					
					<div class="columns">
						<div class="column is-one-fifth">
							<label class="label">Correo electrónico</label>
							<input type="email" id="mailres" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" onchange="ValEmailRes();">
							<p class="help is-danger" id="ErrMailres" hidden>Campo obligatorio *</p>
							<p class="help is-danger" id="ErrMailRes" hidden>Debe digitar un e-mail valido *</p>							
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Profesión</label>
							<div class="select">
								<select name="proferes" id="proferes" onchange="ValProfeRes();">
									<option value="">Seleccione</option>
									@foreach($profesiones->all() as $profesion)
										<option value="{{ $profesion->codigo }}">{{ $profesion->nombre }}</option>
									@endforeach
								</select>
							</div>
							<p class="help is-danger" id="ErrProferes" hidden>Campo obligatorio *</p>						
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">&nbsp;</label>
							<input type="text" name="otproferes" id="otproferes" class="input {{ $errors->has('otproferes') ? ' is-danger' : '' }}">
							<p class="help is-danger" id="Errotproferes" hidden>Campo obligatorio *</p>
						</div>						
						
						<div class="column is-one-fifth">
							<label class="label">Especialidad</label>
							<div class="select">
								<select name="esperes" id="esperes" onchange="ValidaOtEsperes();">
									<option value="">Seleccione</option>
									@foreach($especialidades->all() as $especialidad)
										<option value="{{ $especialidad->codigo }}">{{ $especialidad->nombre }}</option>
									@endforeach								
								</select>
							</div>
							<p class="help is-danger" id="ErrEsperes" hidden>Campo obligatorio *</p>						
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">&nbsp;</label>
							<input type="text" name="otesperes" id="otesperes" class="input {{ $errors->has('otesperes') ? ' is-danger' : '' }}">
							<p class="help is-danger" id="Errotesperes" hidden>Campo obligatorio *</p>
						</div>
					</div>
					
					<div class="columns">
						<div class="column is-one-fifth">
							<label class="label">Empresa</label>
							<input type="text" name="empreres" id="empreres" class="input {{ $errors->has('empreres') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrEmpreres" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth">
							<label class="label">Cargo</label>
							<input type="text" name="cargres" id="cargres" class="input {{ $errors->has('cargres') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrCargres" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Dirección empresa</label>
							<input type="text" name="dirempres" id="dirempres" class="input {{ $errors->has('dirempres') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrDirempres" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth">
							<label class="label"># Teléfono</label>
							<input type="number" name="telempres" id="telempres" class="input {{ $errors->has('telempres') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrTelempres" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth" style="width: 135px">
							<label class="label">¿Exalumno?</label>
							<input type="checkbox" id="exalumres" style="margin-left: 50px;">						
						</div>						
						
						<div class="column is-one-fifth" hidden>
							<input type="text" id="codest">
							<input type="text" id="usrest">
							<input type="text" id="usrres">
							<input type="text" id="usracu">
						</div>
					</div>
					
					<div class="columns">
						<div class="column is-one-quarter">
							<label class="checkbox">
								<input type="checkbox" id="notires">
								¿Notificaciones via e-mail?
							</label>
						</div>					
					</div>
				
					<hr>
					<a class="button is-link is-medium is-outlined" onclick="GuardarResponsable()">Guardar</a>
					<a class="button is-link is-medium is-outlined" onclick="DevolverCambios()">Cancelar</a>
				</form>		
			</div>
			
			<!-- ACUDIENTE -->
			
			<div class="tab-pane content-acudiente">
				<form class="long-form">
					<div class="columns">
						<div class="column is-one-fifth">
							<label class="label">Nombre</label>
							<input type="text" id="nomacu" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrNomacu" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth">
							<label class="label">Primer apellido</label>
							<input type="text" id="apelacu1" class="input {{ $errors->has('apelacu1') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrApelacu1" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth">
							<label class="label">Segundo apellido</label>
							<input type="text" id="apelacu2" class="input {{ $errors->has('apellido2') ? ' is-danger' : '' }}" >
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Tipo Documento</label>
							<div class="select">
								<select name="tipdocuacu" id="tipdocuacu">
									<option value="">Seleccione</option>
									@foreach($tipodocumentos->all() as $tpdocu)
										<option value="{{ $tpdocu->codigo }}">{{ $tpdocu->nombre }}</option>
									@endforeach
								</select>
							</div>
							<p class="help is-danger" id="ErrTDacu" hidden>Campo obligatorio *</p>							
						</div>
						
						<div class="column is-one-fifth">
							<label class="label"># Documento</label>
							<input type="number" name="numdocuacu" id="numdocuacu" class="input {{ $errors->has('numdocu') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrNumdocuacu" hidden>Campo obligatorio *</p>
						</div>
					</div>
					
					<div class="columns">
						<div class="column is-one-fifth">
							<label class="label">Estado civil</label>
							<div class="select">
								<select name="tipestciv" id="tipestciv">
									<option value="">Seleccione</option>
									@foreach($estcivil->all() as $estciv)
										<option value="{{ $estciv->codigo }}">{{ $estciv->nombre }}</option>
									@endforeach
								</select>
							</div>
							<p class="help is-danger" id="ErrTPestciv" hidden>Campo obligatorio *</p>							
						</div>
						
						<div class="column is-one-fifth" >
							<label class="label">País nacimiento</label>
							<input type="text" name="painaceacu" id="painaceacu" attr-value="CO" value="Colombia" class="input {{ $errors->has('painaceacu') ? ' is-danger' : '' }}">
							<p class="help is-danger" id="ErrPainaceacu" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Dirección</label>
							<input type="text" name="direcacu" id="direcacu" class="input {{ $errors->has('direcacu') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrDirecacu" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth">
							<label class="label"># Teléfono</label>
							<input type="number" name="fijoacu" id="fijoacu" class="input {{ $errors->has('fijoacu') ? ' is-danger' : '' }}" >
						</div>

						<div class="column is-one-fifth">
							<label class="label"># Celular</label>
							<input type="number" name="celuacu" id="celuacu" class="input {{ $errors->has('celuacu') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrCeluacu" hidden>Campo obligatorio *</p>
						</div>					
					</div>
					
					<div class="columns">
						<div class="column is-one-fifth">
							<label class="label">Correo electrónico</label>
							<input type="email" id="mailacu" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" onchange="ValEmailAcu();">
							<p class="help is-danger" id="ErrMailacu" hidden>Campo obligatorio *</p>
							<p class="help is-danger" id="ErrMailAcu" hidden>Debe digitar un e-mail valido *</p>
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Profesión</label>
							<div class="select">
								<select name="profeacu" id="profeacu" onchange="ValProfeAcu();">
									<option value="">Seleccione</option>
									@foreach($profesiones->all() as $profesion)
										<option value="{{ $profesion->codigo }}">{{ $profesion->nombre }}</option>
									@endforeach
								</select>
							</div>
							<p class="help is-danger" id="ErrProfeacu" hidden>Campo obligatorio *</p>						
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">&nbsp;</label>
							<input type="text" name="otprofeacu" id="otprofeacu" class="input {{ $errors->has('otprofeacu') ? ' is-danger' : '' }}">
							<p class="help is-danger" id="Errotprofeacu" hidden>Campo obligatorio *</p>
						</div>						
						
						<div class="column is-one-fifth">
							<label class="label">Especialidad</label>
							<div class="select">
								<select name="espeacu" id="espeacu" onchange="ValidaOtEspeacu();">
									<option value="">Seleccione</option>
									@foreach($especialidades->all() as $especialidad)
										<option value="{{ $especialidad->codigo }}">{{ $especialidad->nombre }}</option>
									@endforeach								
								</select>
							</div>
							<p class="help is-danger" id="Eracupeacu" hidden>Campo obligatorio *</p>						
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">&nbsp;</label>
							<input type="text" name="otespeacu" id="otespeacu" class="input {{ $errors->has('otespeacu') ? ' is-danger' : '' }}">
							<p class="help is-danger" id="Errotespeacu" hidden>Campo obligatorio *</p>
						</div>						
					</div>
					
					<div class="columns">
						<div class="column is-one-fifth">
							<label class="label">Empresa</label>
							<input type="text" name="empreacu" id="empreacu" class="input {{ $errors->has('empreacu') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrEmpreacu" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth">
							<label class="label">Cargo</label>
							<input type="text" name="cargacu" id="cargacu" class="input {{ $errors->has('cargacu') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrCargacu" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Dirección empresa</label>
							<input type="text" name="dirempacu" id="dirempacu" class="input {{ $errors->has('dirempacu') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrDirempacu" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth">
							<label class="label"># Teléfono</label>
							<input type="number" name="telempacu" id="telempacu" class="input {{ $errors->has('telempacu') ? ' is-danger' : '' }}" >
							<p class="help is-danger" id="ErrTelempacu" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth" style="width: 135px">
							<label class="label">¿Exalumno?</label>
							<input type="checkbox" id="exalumacu" style="margin-left: 50px;">						
						</div>
					</div>
					
					<div class="columns">
						<div class="column is-one-quarter">
							<label class="checkbox">
								<input type="checkbox" id="notiacu">
								¿Notificaciones via e-mail?
							</label>
						</div>					
					</div>
					
					<hr>
					<a class="button is-link is-medium is-outlined" onclick="GuardarAcudiente()">Guardar</a>
					<a class="button is-link is-medium is-outlined" target="_blank" id="btnpago" onclick="ValidarPago()">Recibo de Pago</a>
					<a class="button is-link is-medium is-outlined" onclick="TerminarInscripcion()" id="btnterminar" disabled>Terminar</a>
					<a class="button is-link is-medium is-outlined" onclick="DevolverCambios()">Cancelar</a>
				</form>							
			</div>
		</div>
    </div>   
  </div>
</div>
<script>
	$("#nombre").focus();
	/* PAISES */
	var Arrpaises = <?php echo $paises;?>;
	var paises = [];
	for (i = 0; i < Arrpaises.length; ++i) {
		paises[i] = Arrpaises[i].nombre;
	}

	/* CIUDADES */
	var Arrcuidades = <?php echo $ciudades;?>;
	var ciudades = [];
	for (i = 0; i < Arrcuidades.length; ++i) {
		ciudades[i] = Arrcuidades[i].nombre;
	}

	$("#painace").autocomplete({
		source: paises,
		select: function (e, ui) {		       
			var value = ui.item.value;
			for (var i=0; i<paises.length ; i++){		
				if(value === Arrpaises[i].nombre){
					$("#painace").attr('attr-value',Arrpaises[i].codigo);
				}
			}
		}
	});
	
	$("#painaceres").autocomplete({
		source: paises,
		select: function (e, ui) {		       
			var value = ui.item.value;
			for (var i=0 ; i<paises.length ; i++){		
				if(value === Arrpaises[i].nombre){
					$("#painaceres").attr('attr-value',Arrpaises[i].codigo);
				}
			}
		}
	});
	
	$("#painaceacu").autocomplete({
		source: paises,
		select: function (e, ui) {		       
			var value = ui.item.value;
			for (var i=0 ; i<paises.length ; i++){		
				if(value === Arrpaises[i].nombre){
					$("#painaceacu").attr('attr-value',Arrpaises[i].codigo);
				}
			}
		}
	});	
	
	$("#ciunace").autocomplete({
		source: ciudades,
		select: function (e, ui) {		       
			var value = ui.item.value;
			for (var i=0 ; i<ciudades.length ; i++){		
				if(value === Arrcuidades[i].nombre){
					$("#ciunace").attr('attr-value',Arrcuidades[i].codigo);
				}
			}
		}
	});

	$("#ciuproce").autocomplete({
		source: ciudades,
		select: function (e, ui) {		       
			var value = ui.item.value;
			for (var i=0 ; i<ciudades.length ; i++){		
				if(value === Arrcuidades[i].nombre){
					$("#ciuproce").attr('attr-value',Arrcuidades[i].codigo);
				}
			}
		}
	});	
	
	function ValEmail(){
		var mailestu = $("#email").val();
		var ext = mailestu.search("@");
		
		if(ext == -1){
			$("#ErrMailEstu").removeAttr('hidden');
			$("#email").focus();
		}else{
			$("#ErrMailEstu").attr('hidden','hidden');
		}
		
		var cadena = ".com";		
		if(mailestu.toLowerCase().indexOf(cadena) == -1){
			$("#ErrMailEstu").removeAttr('hidden');
			$("#email").focus();
			
			var cadena = ".es";		
			if(mailestu.toLowerCase().indexOf(cadena) == -1){
				$("#ErrMailEstu").removeAttr('hidden');
				$("#email").focus();
				
				var cadena = ".outlook";		
				if(mailestu.toLowerCase().indexOf(cadena) == -1){
					$("#ErrMailEstu").removeAttr('hidden');
					$("#email").focus();
				}else{
					$("#ErrMailEstu").attr('hidden','hidden');
				}
				
			}else{
				$("#ErrMailEstu").attr('hidden','hidden');
			}				
			
		}else{
			$("#ErrMailEstu").attr('hidden','hidden');
		}		
	}

	function ValEmailRes(){
		var mailestu = $("#mailres").val();
		var ext = mailestu.search("@");
		
		if(ext == -1){
			$("#ErrMailRes").removeAttr('hidden');
			$("#mailres").focus();
		}else{
			$("#ErrMailRes").attr('hidden','hidden');
		}
		
		var cadena = ".com";		
		if(mailestu.toLowerCase().indexOf(cadena) == -1){
			$("#ErrMailRes").removeAttr('hidden');
			$("#mailres").focus();
			
			var cadena = ".es";		
			if(mailestu.toLowerCase().indexOf(cadena) == -1){
				$("#ErrMailRes").removeAttr('hidden');
				$("#mailres").focus();
				
				var cadena = ".outlook";		
				if(mailestu.toLowerCase().indexOf(cadena) == -1){
					$("#ErrMailRes").removeAttr('hidden');
					$("#mailres").focus();
				}else{
					$("#ErrMailRes").attr('hidden','hidden');
				}
				
			}else{
				$("#ErrMailRes").attr('hidden','hidden');
			}				
			
		}else{
			$("#ErrMailRes").attr('hidden','hidden');
		}		
	}

	function ValEmailAcu(){
		var mailestu = $("#mailacu").val();
		var ext = mailestu.search("@");
		if(ext == -1){
			$("#ErrMailAcu").removeAttr('hidden');
			$("#mailacu").focus();
		}else{
			$("#ErrMailAcu").attr('hidden','hidden');
		}

		var cadena = ".com";		
		if(mailestu.toLowerCase().indexOf(cadena) == -1){
			$("#ErrMailAcu").removeAttr('hidden');
			$("#mailacu").focus();
			
			var cadena = ".es";		
			if(mailestu.toLowerCase().indexOf(cadena) == -1){
				$("#ErrMailAcu").removeAttr('hidden');
				$("#mailacu").focus();
				
				var cadena = ".outlook";		
				if(mailestu.toLowerCase().indexOf(cadena) == -1){
					$("#ErrMailAcu").removeAttr('hidden');
					$("#mailacu").focus();
				}else{
					$("#ErrMailAcu").attr('hidden','hidden');
				}
				
			}else{
				$("#ErrMailAcu").attr('hidden','hidden');
			}				
			
		}else{
			$("#ErrMailAcu").attr('hidden','hidden');
		}		
	}	
</script>
@endsection