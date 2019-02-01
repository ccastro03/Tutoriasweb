$(function() {
	$("#sisnvl").attr('disabled','disabled');
	$("#aseguradora").attr('disabled','disabled');
	
	$("#oteps").attr('disabled','disabled');
	$("#otprepagada").attr('disabled','disabled');
	$("#otaseguradora").attr('disabled','disabled');
	$("#otreligion").attr('disabled','disabled');
	
	$("#chcita").attr('disabled','disabled');
	$("#obscitacion").attr('disabled','disabled');
	$("#chaprob").attr('disabled','disabled');
	$("#obsaprobada").attr('disabled','disabled');
	
	$("#otproferes").attr('disabled','disabled');
	$("#otesperes").attr('disabled','disabled');
	$("#otprofeacu").attr('disabled','disabled');
	$("#otespeacu").attr('disabled','disabled');
	
	if($("#chverif").is(':checked') == true){ 
		$("#chcita").removeAttr('disabled');
		$("#chverif").attr('disabled','disabled');
		$("#sede").attr('disabled','disabled');
	}
	
	if($("#chcita").is(':checked') == true){ 
		$("#chaprob").removeAttr('disabled');
	}

	/* ESTUDIANTE */
	var numdocu = document.getElementById("numdocu");
	numdocu.addEventListener('input',function(){
		if (this.value.length > 16){
			this.value = this.value.slice(0,16);
		}
	});
	
	var numfijo = document.getElementById("numfijo");
	numfijo.addEventListener('input',function(){
		if (this.value.length > 7){
			this.value = this.value.slice(0,7);
		}
	});
	
	var numcelular = document.getElementById("numcelular");
	numcelular.addEventListener('input',function(){
		if (this.value.length > 10){
			this.value = this.value.slice(0,10);
		}
	});
	
	/* RESPONSABLE */
	var numdocures = document.getElementById("numdocures");
	numdocures.addEventListener('input',function(){
		if (this.value.length > 16){
			this.value = this.value.slice(0,16);
		}
	});
	
	var fijores = document.getElementById("fijores");
	fijores.addEventListener('input',function(){
		if (this.value.length > 7){
			this.value = this.value.slice(0,7);
		}
	});
	
	var celures = document.getElementById("celures");
	celures.addEventListener('input',function(){
		if (this.value.length > 10){
			this.value = this.value.slice(0,10);
		}
	});
	
	var telempres = document.getElementById("telempres");
	telempres.addEventListener('input',function(){
		if (this.value.length > 10){
			this.value = this.value.slice(0,10);
		}
	});
	
	/* ACUDIENTE */
	var numdocuacu = document.getElementById("numdocuacu");
	numdocuacu.addEventListener('input',function(){
		if (this.value.length > 16){
			this.value = this.value.slice(0,16);
		}
	});
	
	var fijoacu = document.getElementById("fijoacu");
	fijoacu.addEventListener('input',function(){
		if (this.value.length > 7){
			this.value = this.value.slice(0,7);
		}
	});
	
	var celuacu = document.getElementById("celuacu");
	celuacu.addEventListener('input',function(){
		if (this.value.length > 10){
			this.value = this.value.slice(0,10);
		}
	});
	
	var telempacu = document.getElementById("telempacu");
	telempacu.addEventListener('input',function(){
		if (this.value.length > 10){
			this.value = this.value.slice(0,10);
		}
	});	
	
	
});
	
function ValidaSisben(){
	if($("#checksisben").is(':checked') == true){ 
		$("#sisnvl").removeAttr('disabled');
		$("#eps").attr('disabled','disabled');
		$("#prepagada").attr('disabled','disabled');
		$("#eps").val('');
		$("#prepagada").val('');
		$("#oteps").attr('disabled','disabled');
		$("#oteps").val('');
		$("#otprepagada").attr('disabled','disabled');
		$("#otprepagada").val('');		
	}else{
		$("#sisnvl").attr('disabled','disabled');
		$("#eps").removeAttr('disabled');
		$("#prepagada").removeAttr('disabled');
		$("#sisnvl").val('');
	}			
};

function ValidaSegVida(){
	if($("#segvida").is(':checked') == true){ 
		$("#aseguradora").removeAttr('disabled');
	}else{
		$("#aseguradora").attr('disabled','disabled');
		$("#aseguradora").val('');
		$("#otaseguradora").attr('disabled','disabled');
		$("#otaseguradora").val('');		
	}			
};	

function ValidaOtEps(){
	var eps = $("#eps").val();
	
	if(eps == "01"){ 
		$("#oteps").removeAttr('disabled');
		$("#oteps").focus();
	}else{
		$("#oteps").attr('disabled','disabled');
		$("#oteps").val('');
	}			
};

function ValidaOtPrepagada(){
	var prepagada = $("#prepagada").val();
	
	if(prepagada == "01"){ 
		$("#otprepagada").removeAttr('disabled');
		$("#otprepagada").focus();
	}else{
		$("#otprepagada").attr('disabled','disabled');
		$("#otprepagada").val('');
	}			
};

function ValidaOtAsegura(){
	var aseguradora = $("#aseguradora").val();
	
	if(aseguradora == "16"){ 
		$("#otaseguradora").removeAttr('disabled');
		$("#otaseguradora").focus();
	}else{
		$("#otaseguradora").attr('disabled','disabled');
		$("#otaseguradora").val('');
	}			
};

function ValidaOtReli(){
	var religion = $("#religion").val();
	
	if(religion == "04"){ 
		$("#otreligion").removeAttr('disabled');
		$("#otreligion").focus();
	}else{
		$("#otreligion").attr('disabled','disabled');
		$("#otreligion").val('');
	}			
};
	
function GuardarEstudiante(){
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
	
	if(NaceDia<10) {
		NaceDia='0'+NaceDia;
	}
	if(NaceDia == 32){
		NaceDia = '01';
		NaceYear = fecpago.getFullYear()+1;
		if(NaceMes == 12){
			NaceMes = '1';
		}
	}	
	if(NaceMes<10) {
		NaceMes='0'+NaceMes;
	}
	
	var fecha_nace = NaceYear+"/"+NaceMes+"/"+NaceDia;
	/* **************** */
	
	var vlpainace = $("#painace").val();
	var vlciunace = $("#ciunace").val();
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
	var otra_eps = $("#oteps").val();
	var otra_prepagada = $("#otprepagada").val();
	var otra_asegurador = $("#otaseguradora").val();
	var otra_religion = $("#otreligion").val();	
	var obsporque = $("#obsporque").val();
	
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
		Errores += "Debe seleccionar un género!\n"
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
		Errores += "Debe digitar un número de documento valido!\n"
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
		Errores += "Debe digitar un número de celular valido!\n"
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
	if(vlpainace == ""){
		contError += 1;
		Identifi = "#painace";
		Errores += "Debe seleccionar un país valido!\n"
		$("#ErrPainace").removeAttr('hidden');
	}else{
		$("#ErrPainace").attr('hidden','hidden');
		var painace = $("#painace").attr("attr-value");
	}
	if(vlciunace == ""){
		contError += 1;
		Identifi = "#ciunace";
		Errores += "Debe seleccionar una ciudad valida!\n"
		$("#ErrCiunace").removeAttr('hidden');
	}else{
		$("#ErrCiunace").attr('hidden','hidden');
		var ciunace = $("#ciunace").attr("attr-value");
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
	if(($("#segvida").is(':checked') == true) && (aseguradora == "")){
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
		Errores += "Debe seleccionar una religión valida!\n"
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
	if((eps == "01") && (otra_eps == "")){
		contError += 1;
		Identifi = "#oteps";
		Errores += "Debe digitar una eps valida!\n"
		$("#Erroteps").removeAttr('hidden');
	}else{
		$("#Erroteps").attr('hidden','hidden');
	}
	if((prepagada == "01") && (otra_prepagada == "")){
		contError += 1;
		Identifi = "#otprepagada";
		Errores += "Debe digitar una prepagada valida!\n"
		$("#Errotprepagada").removeAttr('hidden');
	}else{
		$("#Errotprepagada").attr('hidden','hidden');
	}	
	if((aseguradora == "16") && (otra_asegurador == "")){ 
		contError += 1;
		Identifi = "#otaseguradora";
		Errores += "Debe digitar una aseguradora valida!\n"
		$("#Errotaseguradora").removeAttr('hidden');
	}else{
		$("#Errotaseguradora").attr('hidden','hidden');
	}
	if((religion == "04") && (otra_religion == "")){ 
		contError += 1;
		Identifi = "#otreligion";
		Errores += "Debe digitar una religión valida!\n"
		$("#Errotreligion").removeAttr('hidden');
	}else{
		$("#Errotreligion").attr('hidden','hidden');
	}
	if(obsporque == ""){
		contError += 1;
		Identifi = "#obsporque";
		Errores += "Debe digitar un porqué valido!\n"
		$("#Errobsporque").removeAttr('hidden');
	}else{
		$("#Errobsporque").attr('hidden','hidden');
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
		"otra_eps":otra_eps,
		"otra_prepagada":otra_prepagada,
		"otra_asegurador":otra_asegurador,
		"otra_religion":otra_religion,
		"obsporque":obsporque,
	};	
	
	if(contError == 0){
		$.ajax({
			url: "/tutoriaweb/public/incripciones/validarEstudiante",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'ArrDatos':ArrDatos},
			success: function(data){
				if(data[0] == 0){
					swal(data[1], "", "warning");
					$('.swal-button--confirm').click(function(){
						$.ajax({
							url: "/tutoriaweb/public/incripciones/actualizarEstudiante",
							dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
							method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
							data: {'ArrDatos':ArrDatos},
							success: function(data){
								swal(data[1], "", "success");
								$('.swal-button--confirm').click(function(){
									$("#nomres").focus();
									$("#responsable").removeAttr('disabled');
									$("#acudiente").removeAttr('disabled');
									$("#numdocu").attr('disabled','disabled');
									$("#codest").val(data[2]);
									$("#usrest").val(data[3]);
									$("#estudiante").removeAttr('checked');
									$("#liEst").removeClass("is-active");
									$("#responsable").removeAttr('disabled');
									$("#liRespo").addClass("is-active");
									$("#responsable").attr('checked','checked');
									$("#nomres").focus();
								});								
								$("#responsable").removeAttr('disabled');
								$("#acudiente").removeAttr('disabled');
								$("#numdocu").attr('disabled','disabled');
								$("#codest").val(data[2]);
								$("#usrest").val(data[3]);
								$("#estudiante").removeAttr('checked');
								$("#liEst").removeClass("is-active");
								$("#responsable").removeAttr('disabled');
								$("#liRespo").addClass("is-active");
								$("#responsable").attr('checked','checked');
								$("#nomres").focus();								
							}
						});
					});
				}else if(data[0] == true){
					swal(data[1], "", "success");
					$('.swal-button--confirm').click(function(){
						$("#nomres").focus();
						$("#responsable").removeAttr('disabled');
						$("#acudiente").removeAttr('disabled');
						$("#numdocu").attr('disabled','disabled');
						$("#codest").val(data[2]);
						$("#usrest").val(data[3]);
						$("#estudiante").removeAttr('checked');
						$("#liEst").removeClass("is-active");
						$("#responsable").removeAttr('disabled');
						$("#liRespo").addClass("is-active");
						$("#responsable").attr('checked','checked');
						$("#nomres").focus();
					});					
					$("#responsable").removeAttr('disabled');
					$("#acudiente").removeAttr('disabled');
					$("#numdocu").attr('disabled','disabled');
					$("#codest").val(data[2]);
					$("#usrest").val(data[3]);
					$("#estudiante").removeAttr('checked');
					$("#liEst").removeClass("is-active");
					$("#responsable").removeAttr('disabled');
					$("#liRespo").addClass("is-active");
					$("#responsable").attr('checked','checked');
					$("#nomres").focus();
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

function ValProfeRes(){
	var proferes = $("#proferes").val();
	
	if(proferes == "NA"){ 
		$("#esperes").attr('disabled','disabled');
		$("#empreres").attr('disabled','disabled');
		$("#cargres").attr('disabled','disabled');
		$("#esperes").attr('disabled','disabled');
		$("#dirempres").attr('disabled','disabled');
		$("#telempres").attr('disabled','disabled');
	}else{
		$("#esperes").removeAttr('disabled');
		$("#empreres").removeAttr('disabled');
		$("#cargres").removeAttr('disabled');
		$("#esperes").removeAttr('disabled');
		$("#dirempres").removeAttr('disabled');
		$("#telempres").removeAttr('disabled');
	}
	
	if(proferes == "OT"){ 
		$("#otproferes").removeAttr('disabled');
		$("#otproferes").focus();
	}else{
		$("#otproferes").attr('disabled','disabled');
		$("#otproferes").val('');
	}	
};

function ValidaOtEsperes(){
	var esperes = $("#esperes").val();
	
	if(esperes == "OT"){ 
		$("#otesperes").removeAttr('disabled');
		$("#otesperes").focus();
	}else{
		$("#otesperes").attr('disabled','disabled');
		$("#otesperes").val('');
	}			
};

function GuardarResponsable(){
	var contError = 0;
	var Errores = "";
	var Identifi = "";

	var nomres = $("#nomres").val();
	var apelres1 = $("#apelres1").val();
	var apelres2 = $("#apelres2").val();
	var tipdocures = $("#tipdocures").val();
	var numdocures = $("#numdocures").val();
	var tipestciv = $("#tipestciv").val();
	var painaceres = $("#painaceres").attr("attr-value");
	var direcres = $("#direcres").val();
	var fijores = $("#fijores").val();
	var celures = $("#celures").val();
	var mailres = $("#mailres").val();
	var proferes = $("#proferes").val();
	var esperes = $("#esperes").val();
	var empreres = $("#empreres").val();
	var cargres = $("#cargres").val();
	var dirempres = $("#dirempres").val();
	var telempres = $("#telempres").val();
	var chexalumres = $("#exalumres").is(':checked');
	var chnotires = $("#notires").is(':checked');
	var otproferes = $("#otproferes").val();
	var otesperes = $("#otesperes").val();
	
	var codigoest = $("#numdocu").val();
	
	if(chexalumres == false){
		var exalumres = "N";
	}else{
		var exalumres = "S";
	}
	if(chnotires == false){
		var notires = "N";
	}else{
		var notires = "S";
	}		
	if(nomres == ""){
		contError += 1;
		Identifi = "#nomres";
		Errores += "Debe digitar un nombre valido!\n"
		$("#ErrNomres").removeAttr('hidden');
	}else{
		$("#ErrNomres").attr('hidden','hidden');
	}
	if(apelres1 == ""){
		contError += 1;
		Identifi = "#apelres1";
		Errores += "Debe digitar el primer apellido!\n"
		$("#ErrApelres1").removeAttr('hidden');
	}else{
		$("#ErrApelres1").attr('hidden','hidden');
	}	
	if(tipdocures == ""){
		contError += 1;
		Identifi = "#tipdocures";
		Errores += "Debe seleccionar un tipo de documento!\n"
		$("#ErrTDres").removeAttr('hidden');
	}else{
		$("#ErrTDres").attr('hidden','hidden');
	}
	if(numdocures == ""){
		contError += 1;
		Identifi = "#numdocures";
		Errores += "Debe digitar un número de documento valido!\n"
		$("#ErrNumdocures").removeAttr('hidden');
	}else{
		$("#ErrNumdocures").attr('hidden','hidden');
	}
	if(tipestciv == ""){
		contError += 1;
		Identifi = "#tipestciv";
		Errores += "Debe selecionar un estado civil!\n"
		$("#ErrTPestciv").removeAttr('hidden');
	}else{
		$("#ErrTPestciv").attr('hidden','hidden');
	}
	if(painaceres == ""){
		contError += 1;
		Identifi = "#painaceres";
		Errores += "Debe digitar un país de nacimiento valido!\n"
		$("#ErrPainaceres").removeAttr('hidden');
	}else{
		$("#ErrPainaceres").attr('hidden','hidden');
	}
	if(direcres == ""){
		contError += 1;
		Identifi = "#direcres";
		Errores += "Debe digitar una dirección de residencia valida!\n"
		$("#ErrDirecres").removeAttr('hidden');
	}else{
		$("#ErrDirecres").attr('hidden','hidden');
	}
	if(celures == ""){
		contError += 1;
		Identifi = "#celures";
		Errores += "Debe digitar un número de celular valido!\n"
		$("#ErrCelures").removeAttr('hidden');
	}else{
		$("#ErrCelures").attr('hidden','hidden');
	}
	if(mailres == ""){
		contError += 1;
		Identifi = "#mailres";
		Errores += "Debe digitar un e-mail valido!\n"
		$("#ErrMailres").removeAttr('hidden');
	}else{
		$("#ErrMailres").attr('hidden','hidden');
	}
	if(proferes == ""){
		contError += 1;
		Identifi = "#proferes";
		Errores += "Debe seleccionar una profesión!\n"
		$("#ErrProferes").removeAttr('hidden');
	}else{
		$("#ErrProferes").attr('hidden','hidden');
	}
	if(esperes == "" && proferes != "NA"){
		contError += 1;
		Identifi = "#esperes";
		Errores += "Debe seleccionar una especialidad!\n"
		$("#ErrEsperes").removeAttr('hidden');
	}else{
		$("#ErrEsperes").attr('hidden','hidden');
	}
	if(empreres == "" && proferes != "NA"){
		contError += 1;
		Identifi = "#empreres";
		Errores += "Debe digitar un nombre de empresa valida!\n"
		$("#ErrEmpreres").removeAttr('hidden');
	}else{
		$("#ErrEmpreres").attr('hidden','hidden');
	}
	if(cargres == "" && proferes != "NA"){
		contError += 1;
		Identifi = "#cargres";
		Errores += "Debe digitar un cargo valido!\n"
		$("#ErrCargres").removeAttr('hidden');
	}else{
		$("#ErrCargres").attr('hidden','hidden');
	}
	if(dirempres == "" && proferes != "NA"){
		contError += 1;
		Identifi = "#dirempres";
		Errores += "Debe digitar una dirección de empresa valida!\n"
		$("#ErrDirempres").removeAttr('hidden');
	}else{
		$("#ErrDirempres").attr('hidden','hidden');
	}
	if(telempres == "" && proferes != "NA"){
		contError += 1;
		Identifi = "#telempres";
		Errores += "Debe digitar un número de empresa valido!\n"
		$("#ErrTelempres").removeAttr('hidden');
	}else{
		$("#ErrTelempres").attr('hidden','hidden');
	}

	var ArrDatos = {
		"nomres":nomres.trim(),
		"apelres1":apelres1.trim(),
		"apelres2":apelres2.trim(),
		"tipdocures":tipdocures,
		"numdocures":numdocures,
		"tipestciv":tipestciv,
		"painaceres":painaceres,
		"direcres":direcres,
		"fijores":fijores,
		"celures":celures,
		"mailres":mailres,
		"proferes":proferes,
		"esperes":esperes,
		"empreres":empreres,
		"cargres":cargres,
		"dirempres":dirempres,
		"telempres":telempres,
		"exalumres":exalumres,
		"notires":notires,
		"otproferes":otproferes,
		"otesperes":otesperes,
		"codigoest":codigoest
	};
	
	if(contError == 0){
		$.ajax({
			url: "/tutoriaweb/public/incripciones/validarResponsable",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'ArrDatos':ArrDatos},
			success: function(data){
				if(data[0] == 0){
					swal(data[1], "", "warning");
					$('.swal-button--confirm').click(function(){
						$.ajax({
							url: "/tutoriaweb/public/incripciones/actualizarResponsable",
							dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
							method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
							data: {'ArrDatos':ArrDatos},
							success: function(data){
								swal(data[1], "", "success");
								$('.swal-button--confirm').click(function(){
									$("#nomacu").focus();
									$("#numdocures").attr('disabled','disabled');
									$("#usrres").val(data[2]);
									$("#responsable").removeAttr('checked');
									$("#liRespo").removeClass("is-active");
									$("#acudiente").removeAttr('disabled');
									$("#liAcu").addClass("is-active");
									$("#acudiente").attr('checked','checked');
									$("#nomacu").focus();
								});								
								$("#numdocures").attr('disabled','disabled');
								$("#usrres").val(data[2]);
								$("#responsable").removeAttr('checked');
								$("#liRespo").removeClass("is-active");
								$("#acudiente").removeAttr('disabled');
								$("#liAcu").addClass("is-active");
								$("#acudiente").attr('checked','checked');
								$("#nomacu").focus();								
							}
						});
					});					
				}else if(data[0] == true){
					swal(data[1], "", "success");
					$('.swal-button--confirm').click(function(){
						$("#nomacu").focus();
						$("#numdocures").attr('disabled','disabled');
						$("#usrres").val(data[2]);
						$("#responsable").removeAttr('checked');
						$("#liRespo").removeClass("is-active");
						$("#acudiente").removeAttr('disabled');
						$("#liAcu").addClass("is-active");
						$("#acudiente").attr('checked','checked');
						$("#nomacu").focus();
					});						
					$("#numdocures").attr('disabled','disabled');
					$("#usrres").val(data[2]);
					$("#responsable").removeAttr('checked');
					$("#liRespo").removeClass("is-active");
					$("#acudiente").removeAttr('disabled');
					$("#liAcu").addClass("is-active");
					$("#acudiente").attr('checked','checked');
					$("#nomacu").focus();					
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

function ValProfeAcu(){
	if($("#profeacu").val() == "NA"){ 
		$("#espeacu").attr('disabled','disabled');
		$("#empreacu").attr('disabled','disabled');
		$("#cargacu").attr('disabled','disabled');
		$("#espeacu").attr('disabled','disabled');
		$("#dirempacu").attr('disabled','disabled');
		$("#telempacu").attr('disabled','disabled');
	}else{
		$("#espeacu").removeAttr('disabled');
		$("#empreacu").removeAttr('disabled');
		$("#cargacu").removeAttr('disabled');
		$("#espeacu").removeAttr('disabled');
		$("#dirempacu").removeAttr('disabled');
		$("#telempacu").removeAttr('disabled');
	}
	
	if($("#profeacu").val() == "OT"){ 
		$("#otprofeacu").removeAttr('disabled');
		$("#otprofeacu").focus();
	}else{
		$("#otprofeacu").attr('disabled','disabled');
		$("#otprofeacu").val('');
	}	
};

function ValidaOtEspeacu(){	
	if($("#espeacu").val() == "OT"){ 
		$("#otespeacu").removeAttr('disabled');
		$("#otespeacu").focus();
	}else{
		$("#otespeacu").attr('disabled','disabled');
		$("#otespeacu").val('');
	}	
};

function GuardarAcudiente(){
	var nomacu = $("#nomacu").val();
	var apelacu1 = $("#apelacu1").val();
	var apelacu2 = $("#apelacu2").val();
	var tipdocuacu = $("#tipdocuacu").val();
	var numdocuacu = $("#numdocuacu").val();
	var tipestciv = $("#tipestciv").val();
	var painaceacu = $("#painaceacu").attr("attr-value");
	var direcacu = $("#direcacu").val();
	var fijoacu = $("#fijoacu").val();
	var celuacu = $("#celuacu").val();
	var mailacu = $("#mailacu").val();
	var profeacu = $("#profeacu").val();
	var espeacu = $("#espeacu").val();
	var empreacu = $("#empreacu").val();
	var cargacu = $("#cargacu").val();
	var dirempacu = $("#dirempacu").val();
	var telempacu = $("#telempacu").val();
	var chexalumacu = $("#exalumacu").is(':checked');
	var chnotiacu = $("#notiacu").is(':checked');
	var otprofeacu = $("#otprofeacu").val();
	var otespeacu = $("#otespeacu").val();	
	
	var codigoest = $("#numdocu").val();
	var guest = $("#guest").val();
	
	if(chexalumacu == false){
		var exalumacu = "N";
	}else{
		var exalumacu = "S";
	}
	if(chnotiacu == false){
		var notiacu = "N";
	}else{
		var notiacu = "S";
	}		
	
	var ArrDatos = {
		"nomacu":nomacu.trim(),
		"apelacu1":apelacu1.trim(),
		"apelacu2":apelacu2.trim(),
		"tipdocuacu":tipdocuacu,
		"numdocuacu":numdocuacu,
		"tipestciv":tipestciv,
		"painaceacu":painaceacu,
		"direcacu":direcacu,
		"fijoacu":fijoacu,
		"celuacu":celuacu,
		"mailacu":mailacu,
		"profeacu":profeacu,
		"espeacu":espeacu,
		"empreacu":empreacu,
		"cargacu":cargacu,
		"dirempacu":dirempacu,
		"telempacu":telempacu,
		"exalumacu":exalumacu,
		"notiacu":notiacu,
		"otprofeacu":otprofeacu,
		"otespeacu":otespeacu,		
		"codigoest":codigoest
	};
	
	$.ajax({
		url: "/tutoriaweb/public/incripciones/validarAcudiente",
		dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
		method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
		data: {'ArrDatos':ArrDatos},
		success: function(data){
			if(data[0] == 0){
				swal(data[1], "", "warning");
				$('.swal-button--confirm').click(function(){
					$.ajax({
						url: "/tutoriaweb/public/incripciones/actualizarAcudiente",
						dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
						method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
						data: {'ArrDatos':ArrDatos},
						success: function(data){
							$("#numdocuacu").attr('disabled','disabled');
							$("#usracu").val(data[2]);
							
							swal(data[1], "", "success");
							$('.swal-button--confirm').click(function(){
								$("#nomacu").focus();
								$("#numdocuacu").attr('disabled','disabled');
								$("#usracu").val(data[2]);								
							});
						}
					});
				});				
			}else if(data[0] == true){					
				$("#numdocuacu").attr('disabled','disabled');
				$("#usracu").val(data[2]);
				
				swal(data[1], "", "success");
				$('.swal-button--confirm').click(function(){
					$("#nomacu").focus();
					$("#numdocuacu").attr('disabled','disabled');
					$("#usracu").val(data[2]);					
				});					
			}
		}
	});	
};

function DevolverCambios(){
	swal("¿Desea cancelar la Inscripción?", "Recuerde que si cancela todo su proceso se perderá.", "warning", {
		buttons: ["No", "Si"],
	});
	$('.swal-button--confirm').click(function(){
					
		var numdocest = $("#numdocu").val();
		var numdocres = $("#numdocures").val();
		var numdocacu = $("#numdocuacu").val();
		var codigoest = $("#codest").val();
		
		var usuest = $("#usrest").val();
		var usures = $("#usrres").val();
		var usuacu = $("#usracu").val();	
		
		var guest = $("#guest").val();
		
		var ArrDatos = {
			"numdocest":numdocest,
			"numdocres":numdocres,
			"numdocacu":numdocacu,
			"codigoest":codigoest,
			"usuest":usuest,
			"usures":usures,
			"usuacu":usuacu,
		};	
		
		$.ajax({
			url: "/tutoriaweb/public/incripciones/devolverCambios",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'ArrDatos':ArrDatos},
			success: function(data){
				swal("Inscripción cancelada", "", "success")
				.then((value) => {
					if(guest != 1){
						location.href = '/tutoriaweb/public/incripciones';
					}else{
						location.href = '/tutoriaweb/public/';
					}
				});	
			}
		});	
	});
};

function ValChVerificado(){
	if($("#chverif").is(':checked') == true){ 
		$("#chcita").removeAttr('disabled');
		$("#sede").attr('disabled','disabled');
	}else{
		$("#chcita").attr('disabled','disabled');
		$("#obscitacion").attr('disabled','disabled');
		$("#sede").removeAttr('disabled');
		$("#obscitacion").val("");
	}		

	var hoy = new Date();
	var Dia = hoy.getDate();
	var Mes = hoy.getMonth()+1;
	var Year = hoy.getFullYear();
	
	if(Dia<10) {
		Dia='0'+Dia;
	}
	if(Mes<10) {
		Mes='0'+Mes;
	}
	var fec_ver = Year+"-"+Mes+"-"+Dia;
	
	if($("#chverif").is(':checked') == true){ 
		$("#fecverif").val(fec_ver);
		$("#fecverif").removeAttr('disabled');
	}else{
		$("#fecverif").val("");
		$("#fecverif").attr('disabled','disabled');
	}	
};

function ValChCitacion(){
	if($("#chcita").is(':checked') == true){ 
		$("#obscitacion").removeAttr('disabled');
	}else{
		$("#obscitacion").attr('disabled','disabled');
		$("#obscitacion").val("");
	}
	
	var hoy = new Date();
	var Dia = hoy.getDate();
	var Mes = hoy.getMonth()+1;
	var Year = hoy.getFullYear();
	
	if(Dia<10) {
		Dia='0'+Dia;
	}
	if(Mes<10) {
		Mes='0'+Mes;
	}
	var fec_cit = Year+"-"+Mes+"-"+Dia;
	
	if($("#chcita").is(':checked') == true){ 
		$("#feccita").val(fec_cit);
		$("#feccita").removeAttr('disabled');
	}else{
		$("#feccita").val("");
		$("#feccita").attr('disabled','disabled');
	}	
};

function ValChPago(){
	var hoy = new Date();
	var Dia = hoy.getDate();
	var Mes = hoy.getMonth()+1;
	var Year = hoy.getFullYear();
	
	if(Dia<10) {
		Dia='0'+Dia;
	}
	if(Mes<10) {
		Mes='0'+Mes;
	}
	var fec_pago = Year+"-"+Mes+"-"+Dia;
	
	if($("#chpago").is(':checked') == true){ 
		$("#fecpago").val(fec_pago);
		$("#fecpago").removeAttr('disabled');
	}else{
		$("#fecpago").val("");
		$("#fecpago").attr('disabled','disabled');
	}			
};

function ValChAprob(){
	var hoy = new Date();
	var Dia = hoy.getDate();
	var Mes = hoy.getMonth()+1;
	var Year = hoy.getFullYear();
	
	if(Dia<10) {
		Dia='0'+Dia;
	}
	if(Mes<10) {
		Mes='0'+Mes;
	}
	var fec_apr = Year+"-"+Mes+"-"+Dia;
	
	if($("#chaprob").is(':checked') == true){ 
		$("#fecaproba").val(fec_apr);
		$("#fecaproba").removeAttr('disabled');
	}else{
		$("#fecaproba").val("");
		$("#fecaproba").attr('disabled','disabled');
	}			
};

function ChEstudiante(){
	$("#responsable").removeAttr('checked');
	$("#acudiente").removeAttr('checked');
	
	$("#liRespo").removeClass("is-active");
	$("#liAcu").removeClass("is-active");
	
	$("#liEst").addClass("is-active");
	$("#estudiante").attr('checked','checked');
	
	$("#nombre").focus();
};

function ChResponsable(){
	$("#estudiante").removeAttr('checked');
	$("#acudiente").removeAttr('checked');
	
	$("#liEst").removeClass("is-active");
	$("#liAcu").removeClass("is-active");
	
	$("#liRespo").addClass("is-active");
	$("#responsable").attr('checked','checked');
	
	$("#nomres").focus();
};

function ChAcudiente(){
	$("#responsable").removeAttr('checked');
	$("#estudiante").removeAttr('checked');
	
	$("#liRespo").removeClass("is-active");
	$("#liEst").removeClass("is-active");
	
	$("#liAcu").addClass("is-active");
	$("#acudiente").attr('checked','checked');
	
	$("#nomacu").focus();
};



function UpdInscripcion(){
	var codInscrip = $("#codInscrip").val();
	var codsede = $("#sede").val();
	var obscitacion = $("#obscitacion").val();
	var obsaprobada = $("#obsaprobada").val();
	var codEstud = $("#codEstud").val();
	
	if($("#chverif").is(':checked') == true){
		var chverif = "S";
	}else{
		var chverif = "N";
	};
	
	if($("#chcita").is(':checked') == true){
		var chcita = "S";
	}else{
		var chcita = "N";
	};
	
	if($("#chaprob").is(':checked') == true){
		var chaprob = "S";
	}else{
		var chaprob = "N";
	};
	
	if($("#chpago").is(':checked') == true){
		var chpago = "S";
	}else{
		var chpago = "N";
	};
	
	var fecpago = new Date($("#fecpago").val());
	var fecverif = new Date($("#fecverif").val());
	var feccita = new Date($("#feccita").val());
	var fecaproba = new Date($("#fecaproba").val());
	
	/* Fecha pago */
	var PagDia = fecpago.getDate()+1;
	var PagMes = fecpago.getMonth()+1;
	var PagYear = fecpago.getFullYear();
	if(PagDia < 10){
		PagDia = '0'+PagDia;	
	}
	if(PagDia == 32){
		PagDia = '01';
		PagYear = fecpago.getFullYear()+1;
		if(PagMes == 12){
			PagMes = '1';
		}
	}
	if(PagMes < 10){
		PagMes = '0'+PagMes;
	}	
	var fecha_pago = PagYear+"/"+PagMes+"/"+PagDia;
	/* **************** */
	
	/* Fecha verificacion */
	var VerDia = fecverif.getDate()+1;
	var VerMes = fecverif.getMonth()+1;
	var VerYear = fecverif.getFullYear();
	if(VerDia < 10){
		VerDia = '0'+VerDia;	
	}
	if(VerDia == 32){
		VerDia = '01';
		VerYear = fecverif.getFullYear()+1;
		if(VerMes == 12){
			VerMes = '1';
		}
	}
	if(VerMes < 10){
		VerMes = '0'+VerMes;
	}	
	var fecha_ver = VerYear+"/"+VerMes+"/"+VerDia;
	/* **************** */	
	
	/* Fecha citacion */
	var CitDia = feccita.getDate()+1;
	var CitMes = feccita.getMonth()+1;
	var CitYear = feccita.getFullYear();
	if(CitDia < 10){
		CitDia = '0'+CitDia;	
	}
	if(CitDia == 32){
		CitDia = '01';
		CitYear = feccita.getFullYear()+1;
		if(CitMes == 12){
			CitMes = '1';
		}
	}
	if(CitMes < 10){
		CitMes = '0'+CitMes;
	}	
	var fecha_cit = CitYear+"/"+CitMes+"/"+CitDia;
	/* **************** */	
	
	/* Fecha aprobacion */
	var AprDia = fecaproba.getDate()+1;
	var AprMes = fecaproba.getMonth()+1;
	var AprYear = fecaproba.getFullYear();
	if(AprDia < 10){
		AprDia = '0'+AprDia;	
	}
	if(AprDia == 32){
		AprDia = '01';
		AprYear = fecaproba.getFullYear()+1;
		if(AprMes == 12){
			AprMes = '1';
		}
	}
	if(AprMes < 10){
		AprMes = '0'+AprMes;
	}	
	var fecha_apr = AprYear+"/"+AprMes+"/"+AprDia;
	/* **************** */	
	
	if (fecha_pago == "NaN/NaN/NaN"){
		fecha_pago = "0001-01-01";
	}
	
	if (fecha_ver == "NaN/NaN/NaN"){
		fecha_ver = "0001-01-01";
	}

	if (fecha_cit == "NaN/NaN/NaN"){
		fecha_cit = "0001-01-01";
	}

	if (fecha_apr == "NaN/NaN/NaN"){
		fecha_apr = "0001-01-01";
	}	
		
	var ArrDatos = {
		"codInscrip":codInscrip,
		"codsede":codsede,
		"obscitacion":obscitacion,
		"obsaprobada":obsaprobada,
		"chverif":chverif,
		"chcita":chcita,
		"chaprob":chaprob,
		"codEstud":codEstud,
		"chpago":chpago,
		"fecpago":fecha_pago,
		"fecverif":fecha_ver,
		"feccita":fecha_cit,
		"fecaproba":fecha_apr,
	};	
	
	$.ajax({
		url: "/tutoriaweb/public/incripciones/actualizar",
		dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
		method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
		data: {'ArrDatos':ArrDatos},
		success: function(data){
			swal(data[1], "", "success")
			.then((value) => {
				location.href = '/tutoriaweb/public/incripciones';
			});
		}
	});	
};

function TerminarInscripcion(){
	
	var vlrattr = $("#btnterminar").attr('disabled');
	
	if(vlrattr != "disabled"){
		var sede = $("#sede").val();	
		var numdocumento = $("#numdocu").val();
		
		var ArrDatos = {
			"sede":sede,
			"numdocumento":numdocumento,
		};
		
		swal("¿Desea terminar y enviar la inscripción al colegio?", "", "success", {
			buttons: ["No", "Si"],
		});
		$('.swal-button--confirm').click(function(){
			$.ajax({
				url: "/tutoriaweb/public/incripciones/terminarInscripcion",
				dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
				method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
				data: {'ArrDatos':ArrDatos},
				success: function(data){
					swal("La inscripción fue enviada corectamente al colegio", "", "success")
					.then((value) => {
						if(guest != 1){
							location.href = '/tutoriaweb/public/incripciones';
						}else{
							location.href = '/tutoriaweb/public/';
						}
					});	
				}
			});
		});
	}else{
		swal("¡Recuerde!", "Debe generar el pago antes de terminar la inscripción", "warning");	
	}
};

function ColoqueRecibo(){
	var numdocumento = $("#numdocu").val();
	var concat = "/tutoriaweb/public/incripciones/generarPago/"+numdocumento
	$("#btnpago").attr('href',concat);
};

function ValidarPago(){
	$("#btnterminar").removeAttr('disabled');
};