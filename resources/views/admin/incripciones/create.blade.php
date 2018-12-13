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
		var contError = 0;
		var Errores = "";
		var Identifi = "";

		var nombre = $("#nombre").val();
		var apellido1 = $("#apellido1").val();
		var apellido2 = $("#apellido2").val();
		var genero = $("#tipgenero").val();
		var tipdocu = $("#tipdocu").val();
		var numdocumento = $("#numdocu").val();
		var direccion = $("#direccion").val();
		var barrio = $("#barrio").val();
		var numfijo = $("#numfijo").val();
		var numcelular = $("#numcelular").val();
		var email = $("#email").val();
		
		/* Fecha Nacimiento */
		var fecnaci = new Date($("#fecnaci").val());
		var NaceDia = fecnaci.getDate()+1;
		var NaceMes = fecnaci.getMonth()+1;
		var NaceYear = fecnaci.getFullYear();
		var fecha_nace = NaceDia+"/"+NaceMes+"/"+NaceYear;
		/* **************** */
		
		var painace = $("#painace").attr("attr-value");
		var ciunace = $("#ciunace").attr("attr-value");
		var tiprh = $("#tiprh").val();
		var sede = $("#sede").val();
		var grado = $("#grado").val();
		var jornada = $("#jornada").val();
		var etnia = $("#etnia").val();
		var chsisben = $("#checksisben").is(':checked');
		var sisnvl = $("#sisnvl").val();
		var eps = $("#eps").val();
		var prepagada = $("#prepagada").val();
		var chsegvida = $("#segvida").is(':checked');
		var aseguradora = $("#aseguradora").val();
		var religion = $("#religion").val();
		var ciuproce = $("#ciuproce").attr("attr-value");
		var colproce = $("#colproce").val();
		var chcobertura = $("#cobertura").is(':checked');
		var chdesplaza = $("#desplaza").is(':checked');
		
		if(chsisben == false){
			var sisben = "N";
		}else{
			var sisben = "S";
		}
		if(chsegvida == false){
			var segvida = "N";
		}else{
			var segvida = "S";
		}
		if(chcobertura == false){
			var cobertura = "N";
		}else{
			var cobertura = "S";
		}
		if(chdesplaza == false){
			var desplaza = "N";
		}else{
			var desplaza = "S";
		}		
		if(nombre == ""){
			contError += 1;
			Identifi = "#nombre";
			Errores += "Debe digitar un nombre valido!\n"
			$("#ErrNombre").removeAttr('hidden');
		}else{
			$("#ErrNombre").attr('hidden','hidden');
		}
		if(apellido1 == ""){
			contError += 1;
			Identifi = "#apellido1";
			Errores += "Debe digitar el primer apellido!\n"
			$("#ErrApellido1").removeAttr('hidden');
		}else{
			$("#ErrApellido1").attr('hidden','hidden');
		}
		if(genero == ""){
			contError += 1;
			Identifi = "#tipgenero";
			Errores += "Debe seleccionar un genero!\n"
			$("#ErrGenero").removeAttr('hidden');
		}else{
			$("#ErrGenero").attr('hidden','hidden');
		}
		if(tipdocu == ""){
			contError += 1;
			Identifi = "#tipdocu";
			Errores += "Debe seleccionar un tipo de documento!\n"
			$("#ErrTipdocu").removeAttr('hidden');
		}else{
			$("#ErrTipdocu").attr('hidden','hidden');
		}
		if(numdocumento == ""){
			contError += 1;
			Identifi = "#numdocu";
			Errores += "Debe digitar un numero de documento valido!\n"
			$("#ErrNumdocu").removeAttr('hidden');
		}else{
			$("#ErrNumdocu").attr('hidden','hidden');
		}
		if(direccion == ""){
			contError += 1;
			Identifi = "#direccion";
			Errores += "Debe digitar una dirección valida!\n"
			$("#ErrDirecc").removeAttr('hidden');
		}else{
			$("#ErrDirecc").attr('hidden','hidden');
		}
		if(barrio == ""){
			contError += 1;
			Identifi = "#barrio";
			Errores += "Debe seleccionar un barrio valido!\n"
			$("#ErrBarrio").removeAttr('hidden');
		}else{
			$("#ErrBarrio").attr('hidden','hidden');
		}
		if(numcelular == ""){
			contError += 1;
			Identifi = "#numcelular";
			Errores += "Debe digitar un numero de celular valido!\n"
			$("#ErrNumcel").removeAttr('hidden');
		}else{
			$("#ErrNumcel").attr('hidden','hidden');
		}
		if(fecha_nace == "NaN/NaN/NaN"){
			contError += 1;
			Identifi = "#fecnaci";
			Errores += "Debe seleccionar una fecha valida!\n"
			$("#ErrFecnace").removeAttr('hidden');
		}else{
			$("#ErrFecnace").attr('hidden','hidden');
		}
		if(painace == ""){
			contError += 1;
			Identifi = "#painace";
			Errores += "Debe seleccionar un pais valido!\n"
			$("#ErrPainace").removeAttr('hidden');
		}else{
			$("#ErrPainace").attr('hidden','hidden');
		}
		if(ciunace == ""){
			contError += 1;
			Identifi = "#ciunace";
			Errores += "Debe seleccionar una ciudad valida!\n"
			$("#ErrCiunace").removeAttr('hidden');
		}else{
			$("#ErrCiunace").attr('hidden','hidden');
		}
		if(tiprh == ""){
			contError += 1;
			Identifi = "#tiprh";
			Errores += "Debe seleccionar un tipo de RH valido!\n"
			$("#ErrTiprh").removeAttr('hidden');
		}else{
			$("#ErrTiprh").attr('hidden','hidden');
		}
		if(sede == ""){
			contError += 1;
			Identifi = "#sede";
			Errores += "Debe seleccionar una sede valida!\n"
			$("#ErrSede").removeAttr('hidden');
		}else{
			$("#ErrSede").attr('hidden','hidden');
		}
		if(grado == ""){
			contError += 1;
			Identifi = "#grado";
			Errores += "Debe seleccionar un grado valido!\n"
			$("#ErrGrado").removeAttr('hidden');
		}else{
			$("#ErrGrado").attr('hidden','hidden');
		}
		if(jornada == ""){
			contError += 1;
			Identifi = "#jornada";
			Errores += "Debe seleccionar una jornada valida!\n"
			$("#ErrJornada").removeAttr('hidden');
		}else{
			$("#ErrJornada").attr('hidden','hidden');
		}
		if(etnia == ""){
			contError += 1;
			Identifi = "#etnia";
			Errores += "Debe seleccionar una etnia valida!\n"
			$("#ErrEtnia").removeAttr('hidden');
		}else{
			$("#ErrEtnia").attr('hidden','hidden');
		}
		if(($("#checksisben").is(':checked') == true) && (sisnvl == "")){
			contError += 1;
			Identifi = "#sisnvl";
			Errores += "Debe seleccionar un nivel valido!\n"
			$("#ErrSisnvl").removeAttr('hidden');
		}else{
			$("#ErrSisnvl").attr('hidden','hidden');
		}
		if(($("#checksisben").is(':checked') == false) && (eps == "")){
			contError += 1;
			Identifi = "#eps";
			Errores += "Debe seleccionar una eps valida!\n"
			$("#ErrEps").removeAttr('hidden');
		}else{
			$("#ErrEps").attr('hidden','hidden');
		}
		if(($("#segvida").is(':checked') == true) && (eps == "")){
			contError += 1;
			Identifi = "#aseguradora";
			Errores += "Debe seleccionar una aseguradora valida!\n"
			$("#ErrAsegura").removeAttr('hidden');
		}else{
			$("#ErrAsegura").attr('hidden','hidden');
		}
		if(religion == ""){
			contError += 1;
			Identifi = "#religion";
			Errores += "Debe seleccionar una religion valida!\n"
			$("#ErrReligion").removeAttr('hidden');
		}else{
			$("#ErrReligion").attr('hidden','hidden');
		}
		if(ciuproce == ""){
			contError += 1;
			Identifi = "#ciuproce";
			Errores += "Debe seleccionar una ciudad de procedencia valida!\n"
			$("#ErrCiuproce").removeAttr('hidden');
		}else{
			$("#ErrCiuproce").attr('hidden','hidden');
		}
		if(colproce == ""){
			contError += 1;
			Identifi = "#colproce";
			Errores += "Debe seleccionar un colegio de procedencia valido!\n"
			$("#ErrColproce").removeAttr('hidden');
		}else{
			$("#ErrColproce").attr('hidden','hidden');
		}		
				
		var ArrDatos = {
			"nombre":nombre.trim(),
			"apellido1":apellido1.trim(),
			"apellido2":apellido2.trim(),
			"genero":genero,
			"tipdocu":tipdocu,
			"numdocumento":numdocumento,
			"direccion":direccion,
			"barrio":barrio,
			"numfijo":numfijo,
			"numcelular":numcelular,
			"email":email,
			"fecha_nace":fecha_nace,
			"painace":painace,
			"ciunace":ciunace,
			"tiprh":tiprh,
			"sede":sede,
			"grado":grado,
			"jornada":jornada,
			"etnia":etnia,
			"sisben":sisben,
			"sisnvl":sisnvl,
			"eps":eps,
			"prepagada":prepagada,
			"segvida":segvida,
			"aseguradora":aseguradora,
			"religion":religion,
			"ciuproce":ciuproce,
			"colproce":colproce,
			"cobertura":cobertura,
			"desplaza":desplaza,
		};
		if(contError == 0){
			$.ajax({
				url: "/incripciones/validarEstudiante",
				dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
				method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
				data: {'ArrDatos':ArrDatos},
				success: function(data){
					console.log(data);
					if(data[0] == 0){
						swal(data[1], "", "warning");
					}else if(data[0] == true){
						swal(data[1], "", "warning");
						$("#responsable").removeAttr('disabled');
						$("#acudiente").removeAttr('disabled');
					}
					
				}
			});
		}else{
			swal("", Errores, "error");
			if(contError == 1){
				$('.swal-button--confirm').click(function(){
					$(Identifi).focus();
				});
			}			
		}
	};		
</script>
@endsection