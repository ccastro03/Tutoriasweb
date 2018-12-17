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
	// var fecha_nace = NaceDia+"/"+NaceMes+"/"+NaceYear;
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
				console.log(data);
				if(data[0] == 0){
					swal(data[1], "", "warning");
				}else if(data[0] == true){
					swal(data[1], "", "warning");
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