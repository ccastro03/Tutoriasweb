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
	var fecha_nace = NaceYear+"/"+NaceMes+"/"+NaceDia;
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
				if(data[0] == 0){
					swal(data[1], "", "warning");
				}else if(data[0] == true){
					swal(data[1], "", "success");
					$("#responsable").removeAttr('disabled');
					$("#acudiente").removeAttr('disabled');
					
					$("#nombre").attr('disabled','disabled');
					$("#apellido1").attr('disabled','disabled');
					$("#apellido2").attr('disabled','disabled');
					$("#tipgenero").attr('disabled','disabled');
					$("#tipdocu").attr('disabled','disabled');
					$("#numdocu").attr('disabled','disabled');
					$("#direccion").attr('disabled','disabled');
					$("#barrio").attr('disabled','disabled');
					$("#numfijo").attr('disabled','disabled');
					$("#numcelular").attr('disabled','disabled');
					$("#email").attr('disabled','disabled');
					$("#fecnaci").attr('disabled','disabled');
					$("#painace").attr('disabled','disabled');
					$("#ciunace").attr('disabled','disabled');
					$("#tiprh").attr('disabled','disabled');
					$("#sede").attr('disabled','disabled');
					$("#grado").attr('disabled','disabled');
					$("#jornada").attr('disabled','disabled');
					$("#etnia").attr('disabled','disabled');
					$("#checksisben").attr('disabled','disabled');
					$("#sisnvl").attr('disabled','disabled');
					$("#eps").attr('disabled','disabled');
					$("#prepagada").attr('disabled','disabled');
					$("#segvida").attr('disabled','disabled');
					$("#aseguradora").attr('disabled','disabled');
					$("#religion").attr('disabled','disabled');
					$("#ciuproce").attr('disabled','disabled');
					$("#colproce").attr('disabled','disabled');
					$("#cobertura").attr('disabled','disabled');
					$("#desplaza").attr('disabled','disabled');
					
					$("#codest").val(data[2]);
					$("#usrest").val(data[3]);

					$("#estudiante").removeAttr('checked');
					$("#liEst").removeClass("is-active");
					$("#responsable").removeAttr('disabled');
					$("#liRespo").addClass("is-active");
					$("#responsable").attr('checked','checked');
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
	if($("#proferes").val() == "NA"){ 
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
		Errores += "Debe digitar un numero de documento valido!\n"
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
		Errores += "Debe digitar un pais de nacimiento valido!\n"
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
		Errores += "Debe digitar un numero de celular valido!\n"
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
		Errores += "Debe seleccionar una profesion!\n"
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
		Errores += "Debe digitar una direccion de empresa valida!\n"
		$("#ErrDirempres").removeAttr('hidden');
	}else{
		$("#ErrDirempres").attr('hidden','hidden');
	}
	if(telempres == "" && proferes != "NA"){
		contError += 1;
		Identifi = "#telempres";
		Errores += "Debe digitar un numero de empresa valido!\n"
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
		"codigoest":codigoest
	};
	if(contError == 0){
		$.ajax({
			url: "/incripciones/validarResponsable",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'ArrDatos':ArrDatos},
			success: function(data){
				if(data[0] == 0){
					swal(data[1], "", "warning");
				}else if(data[0] == true){
					swal(data[1], "", "success");					
					$("#nomres").attr('disabled','disabled');
					$("#apelres1").attr('disabled','disabled');
					$("#apelres2").attr('disabled','disabled');
					$("#tipdocures").attr('disabled','disabled');
					$("#numdocures").attr('disabled','disabled');
					$("#tipestciv").attr('disabled','disabled');
					$("#painaceres").attr('disabled','disabled');
					$("#direcres").attr('disabled','disabled');
					$("#fijores").attr('disabled','disabled');
					$("#celures").attr('disabled','disabled');
					$("#mailres").attr('disabled','disabled');
					$("#proferes").attr('disabled','disabled');
					$("#esperes").attr('disabled','disabled');
					$("#empreres").attr('disabled','disabled');
					$("#cargres").attr('disabled','disabled');
					$("#dirempres").attr('disabled','disabled');
					$("#telempres").attr('disabled','disabled');
					$("#exalumres").attr('disabled','disabled');
					$("#notires").attr('disabled','disabled');
					
					$("#usrres").val(data[2]);
					
					$("#responsable").removeAttr('checked');
					$("#liRespo").removeClass("is-active");
					$("#acudiente").removeAttr('disabled');
					$("#liAcu").addClass("is-active");
					$("#acudiente").attr('checked','checked');					
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
		"codigoest":codigoest
	};
	
	$.ajax({
		url: "/incripciones/validarAcudiente",
		dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
		method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
		data: {'ArrDatos':ArrDatos},
		success: function(data){
			if(data[0] == 0){
				swal(data[1], "", "warning");
			}else if(data[0] == true){
				swal(data[1], "", "success");					
				$("#nomacu").attr('disabled','disabled');
				$("#apelacu1").attr('disabled','disabled');
				$("#apelacu2").attr('disabled','disabled');
				$("#tipdocuacu").attr('disabled','disabled');
				$("#numdocuacu").attr('disabled','disabled');
				$("#tipestciv").attr('disabled','disabled');
				$("#painaceacu").attr('disabled','disabled');
				$("#direcacu").attr('disabled','disabled');
				$("#fijoacu").attr('disabled','disabled');
				$("#celuacu").attr('disabled','disabled');
				$("#mailacu").attr('disabled','disabled');
				$("#profeacu").attr('disabled','disabled');
				$("#espeacu").attr('disabled','disabled');
				$("#empreacu").attr('disabled','disabled');
				$("#cargacu").attr('disabled','disabled');
				$("#dirempacu").attr('disabled','disabled');
				$("#telempacu").attr('disabled','disabled');
				$("#exalumacu").attr('disabled','disabled');
				$("#notiacu").attr('disabled','disabled');
				
				$("#usracu").val(data[2]);
				if(guest != 1){
					location.href = '/incripciones';
				}else{
					location.href = '/';
				}				
			}
		}
	});	
};

function DevolverCambios(){
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
		url: "/incripciones/devolverCambios",
		dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
		method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
		data: {'ArrDatos':ArrDatos},
		success: function(data){
			if(guest != 1){
				location.href = '/incripciones';
			}else{
				location.href = '/';
			}
		}
	});	
};	