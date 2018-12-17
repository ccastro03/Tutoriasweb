@extends('layouts.main')

@section('content')	
<div class="column is-12">

	<input type="radio" id="estudiante" name="nav-tab">
	<input type="radio" id="responsable" name="nav-tab" checked>
	<input type="radio" id="acudiente" name="nav-tab" disabled>

	<div class="tabs is-boxed" style="margin-bottom: 0px;">
		<ul>
			<li class="is-active" id="liEst">
				<a><label for="estudiante">Estudiante</label></a>
			</li>
			<li id="liRespo">
				<a><label for="responsable">Responsable</label></a>
			</li>
			<li id="liAcu">
				<a><label for="acudiente">Acudiente</label></a>
			</li>
		</ul>
	</div>

		<div class="tab-content">
			<div class="tab-pane content-estudiante">
				<form class="long-form">				
					<div class="columns">
						<div class="column is-one-fifth">
							<label class="label">Nombre</label>
							<input type="text" name="name" id="nombre" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" placeholder="Ingrese el nombre">
							<p class="help is-danger" id="ErrNombre" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth">
							<label class="label">Primer apellido</label>
							<input type="text" name="apellido1" id="apellido1" class="input {{ $errors->has('apellido1') ? ' is-danger' : '' }}" placeholder="Ingrese el primer apellido">
							<p class="help is-danger" id="ErrApellido1" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth">
							<label class="label">Segundo apellido</label>
							<input type="text" name="apellido2" id="apellido2" class="input {{ $errors->has('apellido2') ? ' is-danger' : '' }}" placeholder="Ingrese el segundo apellido">
						</div>

						<div class="column is-one-fifth" style="width: 155px">
							<label class="label">Genero</label>
							<div class="select">
								<select name="tipgenero" id="tipgenero">
									<option value="">Seleccione</option>
									<option value="H">Hombre</option>
									<option value="M">Mujer</option>
								</select>
							</div>
							<p class="help is-danger" id="ErrGenero" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth" style="width: 205px;">
							<label class="label">Tipo Documento</label>
							<div class="select">
								<select name="tipdocu" id="tipdocu">
									<option value="">Seleccione</option>
									<option value="TI">Tarjeta Identidad</option>
									<option value="TE">Tarjeta Extranjeria</option>
									<option value="CC">Cedula Ciudadania</option>
									<option value="OT">Otro</option>
								</select>
							</div>
							<p class="help is-danger" id="ErrTipdocu" hidden>Campo obligatorio *</p>							
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Documento</label>
							<input type="text" name="numdocu" id="numdocu" style="width: 113px;" class="input {{ $errors->has('numdocu') ? ' is-danger' : '' }}" placeholder="Ingrese el numero de documento">
							<p class="help is-danger" id="ErrNumdocu" hidden>Campo obligatorio *</p>
						</div>						
					</div>

					<div class="columns">									
						<div class="column is-one-fifth">
							<label class="label">Dirección</label>
							<input type="text" name="direccion" id="direccion" class="input {{ $errors->has('direccion') ? ' is-danger' : '' }}" placeholder="Ingrese la dirección">
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
							<label class="label"># Telefono</label>
							<input type="text" name="numfijo" id="numfijo" class="input {{ $errors->has('numfijo') ? ' is-danger' : '' }}" placeholder="Ingrese el telefono">
							<p class="help is-danger" id="ErrNumtel" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth" style="width: 157px">
							<label class="label"># Celular</label>
							<input type="text" name="numcelular" id="numcelular" class="input {{ $errors->has('numcelular') ? ' is-danger' : '' }}" placeholder="Ingrese el celular">
							<p class="help is-danger" id="ErrNumcel" hidden>Campo obligatorio *</p>
						</div>	

						<div class="column is-one-quarter">
							<label class="label">Correo electrónico</label>
							<input type="email" id="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" placeholder="Ingrese el e-mail">
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

						<div class="column is-one-fifth" style="width: 105px">
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
						
						<!-- <div class="panel"> 
							<header class="panel-header">
								<p class="panel-heading">Información Colegio</p>
							</header>	
							<div class="panel-block"> -->
								<div class="column is-one-fifth" style="width: 240px">
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

								<div class="column is-one-fifth" style="width: 105px">
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

								<div class="column is-one-fifth" style="width: 150px">
									<label class="label">Jornada</label>
									<div class="select">
										<select name="jornada" id="jornada">
											<option value="">Seleccione</option>
											@foreach($jornadas->all() as $jornada)
												<option value="{{ $jornada->codigo }}">{{ $jornada->nombre }}</option>
											@endforeach							
										</select>
									</div>
									<p class="help is-danger" id="ErrJornada" hidden>Campo obligatorio *</p>
								</div>
							<!--</div>
						</div> -->
					</div>
					
					<div class="columns">
						<div class="column is-one-fifth" style="width: 150px">
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
						
						<div class="column is-one-fifth" style="width: 70px">
							<label class="label">Sisben</label>
							<input type="checkbox" id="checksisben" style="margin-left: 28px;" onclick="ValidaSisben()">
						</div>
						
						<div class="column is-one-fifth" style="width: 110px">
							<label class="label">Nivel</label>
							<div class="select">
								<select name="sisnvl" id="sisnvl">
									<option value="">Otro</option>							
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
								<select name="eps" id="eps">
									<option value="">Seleccione</option>
									@foreach($eps->all() as $ep)
										<option value="{{ $ep->codigo }}">{{ $ep->nombre }}</option>
									@endforeach							
								</select>
							</div>
							<p class="help is-danger" id="ErrEps" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth" style="width: 150px">
							<label class="label">Prepagada</label>
							<div class="select">
								<select name="prepagada" id="prepagada">
									<option value="">Ninguna</option>
									@foreach($prepagadas->all() as $prepagada)
										<option value="{{ $prepagada->codigo }}">{{ $prepagada->nombre }}</option>
									@endforeach							
								</select>
							</div>						
						</div>

						<div class="column is-one-fifth" style="width: 128px">
							<label class="label">Seguro vida</label>
							<input type="checkbox" id="segvida" style="margin-left: 53px;" onclick="ValidaSegVida()">
						</div>
						
						<div class="column is-one-fifth" style="width: 240px">
							<label class="label">Aseguradora</label>
							<div class="select">
								<select name="aseguradora" id="aseguradora">
									<option value="">Ninguno</option>
									@foreach($aseguradoras->all() as $aseguradora)
										<option value="{{ $aseguradora->codigo }}">{{ $aseguradora->nombre }}</option>
									@endforeach
								</select>
							</div>
							<p class="help is-danger" id="ErrAsegura" hidden>Campo obligatorio *</p>							
						</div>

						<div class="column is-one-fifth" style="width: 150px">
							<label class="label">Religion</label>
							<div class="select">
								<select name="religion" id="religion">
									<option value="">Ninguna</option>
									@foreach($religiones->all() as $religion)
										<option value="{{ $religion->codigo }}">{{ $religion->nombre }}</option>
									@endforeach							
								</select>
							</div>
							<p class="help is-danger" id="ErrReligion" hidden>Campo obligatorio *</p>						
						</div>
					</div>
					
					<div class="columns">						
						<div class="column is-one-fifth">
							<label class="label">Ciudad procedencia</label>
							<input type="text" name="ciuproce" id="ciuproce" attr-value="01" value="Cali" class="input {{ $errors->has('ciuproce') ? ' is-danger' : '' }}">
							<p class="help is-danger" id="ErrCiuproce" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth">
							<label class="label">Colegio procedencia</label>
							<input type="text" name="colproce" id="colproce" class="input {{ $errors->has('colproce') ? ' is-danger' : '' }}" placeholder="Ingrese la procedencia">
							<p class="help is-danger" id="ErrColproce" hidden>Campo obligatorio *</p>
						</div>
						<div class="column is-one-fifth" style="width: 164px">
							<label class="label">Tiene cobertura?</label>
							<input type="checkbox" id="cobertura" style="margin-left: 65px;">						
						</div>
						
						<div class="column is-one-fifth" style="width: 164px">
							<label class="label">Es desplazado?</label>
							<input type="checkbox" id="desplaza" style="margin-left: 65px;">						
						</div>						
					</div>
					<hr>
					<a class="button is-link is-medium is-outlined" onclick="GuardarEstudiante()">Guardar</a>
					<a href="" class="button is-medium is-link is-outlined">Salir</a>
				</form>
			</div>
			<div class="tab-pane content-responsable">
				<form class="long-form">				
					<div class="columns">
						<div class="column is-one-fifth">
							<label class="label">Nombre</label>
							<input type="text" name="name" id="nomres" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" placeholder="Ingrese el nombre">
							<p class="help is-danger" id="ErrNomres" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth">
							<label class="label">Primer apellido</label>
							<input type="text" name="apelres1" id="apelres1" class="input {{ $errors->has('apelres1') ? ' is-danger' : '' }}" placeholder="Ingrese el primer apellido">
							<p class="help is-danger" id="ErrApelres1" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth">
							<label class="label">Segundo apellido</label>
							<input type="text" name="apelres2" id="apelres2" class="input {{ $errors->has('apellido2') ? ' is-danger' : '' }}" placeholder="Ingrese el segundo apellido">
						</div>
						
						<div class="column is-one-fifth" style="width: 205px;">
							<label class="label">Tipo Documento</label>
							<div class="select">
								<select name="tipdocures" id="tipdocures">
									<option value="">Seleccione</option>
									<option value="TE">Cedula Extranjeria</option>
									<option value="CC">Cedula Ciudadania</option>
									<option value="PO">Pasaporte</option>
									<option value="OT">Otro</option>
								</select>
							</div>
							<p class="help is-danger" id="ErrTipdocu" hidden>Campo obligatorio *</p>							
						</div>
						
						<div class="column is-one-fifth">
							<label class="label"># Documento</label>
							<input type="text" name="numdocures" id="numdocures" style="width: 125px;" class="input {{ $errors->has('numdocu') ? ' is-danger' : '' }}" placeholder="Ingrese el numero de documento">
							<p class="help is-danger" id="ErrNumdocures" hidden>Campo obligatorio *</p>
						</div>
					</div>
					
					<div class="columns">
						<div class="column is-one-fifth">
							<label class="label">Estado civil</label>
							<div class="select">
								<select name="tipestciv" id="tipestciv">
									<option value="">Seleccione</option>
									<option value="SO">Soltero(a)</option>
									<option value="CO">Comprometido(a)</option>
									<option value="CA">Casado(a)</option>
									<option value="DI">Divociado(a)</option>
									<option value="VI">Viudo(a)</option>
									<option value="OT">Otro</option>
								</select>
							</div>
							<p class="help is-danger" id="ErrTipdocu" hidden>Campo obligatorio *</p>							
						</div>
						
						<div class="column is-one-fifth" >
							<label class="label">País nacimiento</label>
							<input type="text" name="painaceres" id="painaceres" attr-value="CO" value="Colombia" class="input {{ $errors->has('painaceres') ? ' is-danger' : '' }}">
							<p class="help is-danger" id="ErrPainaceres" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Dirección</label>
							<input type="text" name="direcres" id="direcres" class="input {{ $errors->has('direcres') ? ' is-danger' : '' }}" placeholder="Ingrese la dirección">
							<p class="help is-danger" id="ErrDirecres" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth" style="width: 157px">
							<label class="label"># Telefono</label>
							<input type="text" name="fijores" id="fijores" class="input {{ $errors->has('fijores') ? ' is-danger' : '' }}" placeholder="Ingrese el telefono">
							<p class="help is-danger" id="ErrFijores" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth" style="width: 157px">
							<label class="label"># Celular</label>
							<input type="text" name="celures" id="celures" class="input {{ $errors->has('celures') ? ' is-danger' : '' }}" placeholder="Ingrese el celular">
							<p class="help is-danger" id="ErrCelures" hidden>Campo obligatorio *</p>
						</div>					
					</div>
					
					<div class="columns">
						<div class="column is-one-quarter">
							<label class="label">Correo electrónico</label>
							<input type="email" id="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" placeholder="Ingrese el e-mail">
							<p class="help is-danger" id="ErrMailres" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Profesion</label>
							<div class="select">
								<select name="proferes" id="proferes">
									<option value="">Seleccione</option>
									<option value="">Otra</option>
									<option value="">No aplica</option>
								</select>
							</div>
							<p class="help is-danger" id="ErrProferes" hidden>Campo obligatorio *</p>						
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Especialidad</label>
							<div class="select">
								<select name="esperes" id="esperes">
									<option value="">Seleccione</option>
									<option value="">Otra</option>
									<option value="">No aplica</option>								
								</select>
							</div>
							<p class="help is-danger" id="ErrEsperes" hidden>Campo obligatorio *</p>						
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Empresa</label>
							<input type="text" name="empreres" id="empreres" class="input {{ $errors->has('empreres') ? ' is-danger' : '' }}" placeholder="Ingrese la empresa">
							<p class="help is-danger" id="ErrEmpreres" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth">
							<label class="label">Cargo</label>
							<input type="text" name="cargres" id="cargres" class="input {{ $errors->has('cargres') ? ' is-danger' : '' }}" placeholder="Ingrese el cargo">
							<p class="help is-danger" id="ErrCargres" hidden>Campo obligatorio *</p>
						</div>
					</div>
					
					<div class="columns">
						<div class="column is-one-fifth">
							<label class="label">Dirección empresa</label>
							<input type="text" name="dirempres" id="dirempres" class="input {{ $errors->has('dirempres') ? ' is-danger' : '' }}" placeholder="Ingrese la dirección empresa">
							<p class="help is-danger" id="ErrDirempres" hidden>Campo obligatorio *</p>
						</div>
						
						<div class="column is-one-fifth" style="width: 157px">
							<label class="label"># Telefono</label>
							<input type="text" name="telempres" id="telempres" class="input {{ $errors->has('telempres') ? ' is-danger' : '' }}" placeholder="Ingrese el telefono empresa">
							<p class="help is-danger" id="ErrTelempres" hidden>Campo obligatorio *</p>
						</div>

						<div class="column is-one-fifth" style="width: 164px">
							<label class="label">Exalumno?</label>
							<input type="checkbox" id="exalumres" style="margin-left: 45px;">						
						</div>
						
						<div class="column is-one-quarter">
							<label class="checkbox">
								<input type="checkbox" id="notires">
								Enviar notificacion via e-mail?
							</label>							
						</div>						
					</div>						
				
					<hr>
					<a class="button is-link is-medium is-outlined" onclick="GuardarResponsable()">Guardar</a>
					<a href="" class="button is-medium is-link is-outlined">Salir</a>
				</form>			
			</div>
			<div class="tab-pane content-acudiente">My Videos</div>
		</div>
    </div>   
  </div>
</div>
<script>
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
			for (var i=0 ; i<paises.length ; i++){		
				if(value === Arrpaises[i].nombre){
					$("#painace").attr('attr-value',Arrpaises[i].codigo);
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
</script>
@endsection