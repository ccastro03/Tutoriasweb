@extends('layouts.main')

@section('content')	
<div class="column is-12">

	<input type="radio" id="estudiante" name="nav-tab" checked>
	<input type="radio" id="responsable" name="nav-tab" disabled>
	<input type="radio" id="acudiente" name="nav-tab" disabled>

	<div class="tabs is-boxed" style="margin-bottom: 0px;">
		<ul>
			<li class="is-active">
				<a><label for="estudiante">Estudiante</label></a>
			</li>
			<li>
				<a><label for="responsable">Responsable</label></a>
			</li>
			<li>
				<a><label for="acudiente">Acudiente</label></a>
			</li>
		</ul>
	</div>

		<div class="tab-content">
			<div class="tab-pane content-estudiante">
				<form class="long-form">
					@csrf
					@if(count($errors) > 0)
					<div class="notification is-danger">
						<button class="delete"></button>
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
				
					<div class="columns">
						<div class="column is-one-fifth">
							<label class="label">Nombre</label>
							<input type="text" name="name" id="nombre" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" placeholder="Ingrese el nombre">
							@if ($errors->has('name'))
								<p class="help is-danger">{{ $errors->first('name') }}</p>
							@endif
						</div>

						<div class="column is-one-fifth">
							<label class="label">Primer apellido</label>
							<input type="text" name="apellido1" id="apellido1" class="input {{ $errors->has('apellido1') ? ' is-danger' : '' }}" placeholder="Ingrese el primer apellido">
							@if ($errors->has('apellido1'))
								<p class="help is-danger">{{ $errors->first('apellido1') }}</p>
							@endif
						</div>

						<div class="column is-one-fifth">
							<label class="label">Segundo apellido</label>
							<input type="text" name="apellido2" id="apellido2" class="input {{ $errors->has('apellido2') ? ' is-danger' : '' }}" placeholder="Ingrese el segundo apellido">
							@if ($errors->has('apellido2'))
								<p class="help is-danger">{{ $errors->first('apellido2') }}</p>
							@endif
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
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Documento</label>
							<input type="text" name="numdocu" id="numdocu" style="width: 113px;" class="input {{ $errors->has('numdocu') ? ' is-danger' : '' }}" placeholder="Ingrese el numero de documento">
							@if ($errors->has('numdocu'))
								<p class="help is-danger">{{ $errors->first('numdocu') }}</p>
							@endif
						</div>						
					</div>

					<div class="columns">									
						
						
						<div class="column is-one-fifth">
							<label class="label">Dirección</label>
							<input type="text" name="direccion" id="direccion" class="input {{ $errors->has('direccion') ? ' is-danger' : '' }}" placeholder="Ingrese la dirección">
							@if ($errors->has('direccion'))
								<p class="help is-danger">{{ $errors->first('direccion') }}</p>
							@endif
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
							@if ($errors->has('barrio'))
								<p class="help is-danger">{{ $errors->first('barrio') }}</p>
							@endif
						</div>

						<div class="column is-one-fifth" style="width: 157px">
							<label class="label"># Telefono</label>
							<input type="text" name="numfijo" id="numfijo" class="input {{ $errors->has('numfijo') ? ' is-danger' : '' }}" placeholder="Ingrese el telefono">
							@if ($errors->has('numfijo'))
								<p class="help is-danger">{{ $errors->first('numfijo') }}</p>
							@endif
						</div>

						<div class="column is-one-fifth" style="width: 157px">
							<label class="label"># Celular</label>
							<input type="text" name="numcelular" id="numcelular" class="input {{ $errors->has('numcelular') ? ' is-danger' : '' }}" placeholder="Ingrese el celular">
							@if ($errors->has('numcelular'))
								<p class="help is-danger">{{ $errors->first('numcelular') }}</p>
							@endif
						</div>	

						<div class="column is-one-quarter">
							<label class="label">Correo electrónico</label>
							<input type="email" name="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" placeholder="Ingrese el e-mail">
							@if ($errors->has('email'))
								<p class="help is-danger">{{ $errors->first('email') }}</p>
							@endif
						</div>

						<div class="column is-one-fifth" style="width: 190px">
							<label class="label">Fecha nacimiento</label>
							<input type="date" name="facnaci" class="input {{ $errors->has('facnaci') ? ' is-danger' : '' }}" max="<?php echo date('Y-m-d');?>">
							@if ($errors->has('facnaci'))
								<p class="help is-danger">{{ $errors->first('facnaci') }}</p>
							@endif
						</div>						
					</div>
				
					<div class="columns">
						<div class="column is-one-fifth" >
							<label class="label">País nacimiento</label>
							<input type="text" name="painace" id="painace" attr-value="CO" value="Colombia" class="input {{ $errors->has('painace') ? ' is-danger' : '' }}">
							<!-- <div class="select">
								<select name="painace" id="painace">
									<option value="">Seleccione</option>
									@foreach($paises->all() as $pais)
										<option value="{{ $pais->codigo }}">{{ $pais->nombre }}</option>
									@endforeach							
								</select>
							</div> -->
							@if ($errors->has('painace'))
								<p class="help is-danger">{{ $errors->first('painace') }}</p>
							@endif
						</div>
						
						<div class="column is-one-fifth">
							<label class="label">Ciudad nacimiento</label>
							<input type="text" name="ciunace" id="ciunace" attr-value="01" value="Cali" class="input {{ $errors->has('ciunace') ? ' is-danger' : '' }}">
							<!-- <div class="select">
								<select name="ciunace" id="ciunace">
									<option value="">Seleccione</option>
									@foreach($ciudades->all() as $ciudad)
										<option value="{{ $ciudad->cod_ciudad }}">{{ $ciudad->nombre }}</option>
									@endforeach							
								</select>
							</div> -->
							@if ($errors->has('ciunace'))
								<p class="help is-danger">{{ $errors->first('ciunace') }}</p>
							@endif
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
									@if ($errors->has('sede'))
										<p class="help is-danger">{{ $errors->first('sede') }}</p>
									@endif
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
									@if ($errors->has('grado'))
										<p class="help is-danger">{{ $errors->first('grado') }}</p>
									@endif
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
									@if ($errors->has('jornada'))
										<p class="help is-danger">{{ $errors->first('jornada') }}</p>
									@endif
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
							@if ($errors->has('etnia'))
								<p class="help is-danger">{{ $errors->first('etnia') }}</p>
							@endif						
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
							@if ($errors->has('eps'))
								<p class="help is-danger">{{ $errors->first('eps') }}</p>
							@endif						
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
							@if ($errors->has('prepagada'))
								<p class="help is-danger">{{ $errors->first('prepagada') }}</p>
							@endif						
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
							@if ($errors->has('aseguradora'))
								<p class="help is-danger">{{ $errors->first('aseguradora') }}</p>
							@endif							
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
							@if ($errors->has('religion'))
								<p class="help is-danger">{{ $errors->first('religion') }}</p>
							@endif						
						</div>
					</div>
					
					<div class="columns">						
						<div class="column is-one-fifth">
							<label class="label">Ciudad procedencia</label>
							<input type="text" name="ciuproce" id="ciuproce" attr-value="01" value="Cali" class="input {{ $errors->has('ciuproce') ? ' is-danger' : '' }}">
							<!-- <div class="select">
								<select name="ciuproce" id="ciuproce">
									<option value="">Seleccione</option>
									@foreach($ciudades->all() as $ciudad)
										<option value="{{ $ciudad->cod_ciudad }}">{{ $ciudad->nombre }}</option>
									@endforeach							
								</select>
							</div> -->
							@if ($errors->has('ciuproce'))
								<p class="help is-danger">{{ $errors->first('ciuproce') }}</p>
							@endif
						</div>

						<div class="column is-one-fifth">
							<label class="label">Colegio procedencia</label>
							<input type="text" name="colproce" id="colproce" class="input {{ $errors->has('colproce') ? ' is-danger' : '' }}" placeholder="Ingrese la procedencia">
							@if ($errors->has('colproce'))
								<p class="help is-danger">{{ $errors->first('colproce') }}</p>
							@endif
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
					<a class="button is-link is-medium is-outlined" onclick="GuardarDatos()">Guardar</a>
					<a href="" class="button is-medium is-link is-outlined">Salir</a>
				</form>
			</div>
			<div class="tab-pane content-responsable">My Music</div>
			<div class="tab-pane content-acudiente">My Videos</div>
		</div>
    </div>   
  </div>
</div>
<script>
	$(function() {
		$("#sisnvl").attr('disabled','disabled');
		$("#aseguradora").attr('disabled','disabled');
	});
	
	function ValidaSisben(){
		if($("#checksisben").is(':checked') == true){ 
			$("#sisnvl").removeAttr('disabled');
			$("#eps").attr('disabled','disabled');
			$("#prepagada").attr('disabled','disabled');
        }else{
			$("#sisnvl").attr('disabled','disabled');
			$("#eps").removeAttr('disabled');
			$("#prepagada").removeAttr('disabled');
		}			
	};
	
	function ValidaSegVida(){
		if($("#segvida").is(':checked') == true){ 
			$("#aseguradora").removeAttr('disabled');
        }else{
			$("#aseguradora").attr('disabled','disabled');
		}			
	};	
	
	/* PAISES */
	var Arrpaises = <?php echo $paises;?>;
	var paises = [];
	for (i = 0; i < Arrpaises.length; ++i) {
		paises[i] = Arrpaises[i].nombre;
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
	
	/* CIUDADES */
	var Arrcuidades = <?php echo $ciudades;?>;
	var ciudades = [];
	for (i = 0; i < Arrcuidades.length; ++i) {
		ciudades[i] = Arrcuidades[i].nombre;
	}
	
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
	
	function GuardarDatos(){
		var painace = $("#painace").attr("attr-value");
		var numdocumento = $("#numdocu").val();
		$.ajax({
			url: "/incripciones/validarEstudiante",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'numdocumento':numdocumento},
			success: function(data){
				swal(data, "", "warning");
				console.log(data);
			}
		});
	};		
</script>
@endsection