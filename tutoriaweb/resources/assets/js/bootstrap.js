
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.swal = require('sweetalert');

/* Cerrar Notificaciones de bulma */

window.$(document).on('click', '.notification > button.delete', function() {
    $(this).parent().addClass('is-hidden');
    return false;
});

/* ELIMINAR ROLES */
window.$(document).on('click', '#BtnDelRol', function (){
	var RolId = $(this).attr("attr-id");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/roles/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':RolId},
			success: function(data){
				if (data = 1){
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/roles';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/* ELIMINAR FUNCIONES */
window.$(document).on('click', '#BtnDelFunc', function (){
	var FuncId = $(this).attr("attr-id");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/funciones/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':FuncId},
			success: function(data){
				var arrayDatos = $.map(data, function(value, index) {
                    return [value];
                });
				
				if (arrayDatos[0] != "" & arrayDatos[0] != null){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/funciones';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/* ELIMINAR PAISES */
window.$(document).on('click', '#BtnDelPais', function (){
	var PaisId = $(this).attr("attr-id");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/paises/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':PaisId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/paises';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/* ELIMINAR CIUDADES */
window.$(document).on('click', '#BtnDelCiu', function (){
	var CiuId = $(this).attr("attr-id");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/ciudades/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':CiuId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/ciudades';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/* ELIMINAR PREPAGADAS */
window.$(document).on('click', '#BtnDelPrepa', function (){
	var PrepaId = $(this).attr("attr-id");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/prepagada/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':PrepaId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/prepagada';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/* ELIMINAR EPS */
window.$(document).on('click', '#BtnDelEps', function (){
	var EpsId = $(this).attr("attr-id");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/eps/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':EpsId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/eps';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/* ELIMINAR BARRIOS */
window.$(document).on('click', '#BtnDelBar', function (){
	var CiuId = $(this).attr("attr-id");
	var BarId = $(this).attr("attr-id2");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/barrios/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'cod_ciudad':CiuId,'cod_barrio':BarId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/barrios';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/* ELIMINAR SEDES */
window.$(document).on('click', '#BtnDelSed', function (){
	var SedeId = $(this).attr("attr-id");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/sedes/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':SedeId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/sedes';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/* ELIMINAR JORNADAS */
window.$(document).on('click', '#BtnDelJor', function (){
	var JorId = $(this).attr("attr-id");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/jornadas/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':JorId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/jornadas';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/* ELIMINAR GRADOS */
window.$(document).on('click', '#BtnDelGrad', function (){
	var GradId = $(this).attr("attr-id");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/grados/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':GradId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/grados';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/* ELIMINAR ETNIAS */
window.$(document).on('click', '#BtnDelEtni', function (){
	var EtniId = $(this).attr("attr-id");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/etnias/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':EtniId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/etnias';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/* ELIMINAR ASEGURADORA */
window.$(document).on('click', '#BtnDelAseg', function (){
	var AsegId = $(this).attr("attr-id");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/aseguradora/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':AsegId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/aseguradora';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/* ELIMINAR RELIGION */
window.$(document).on('click', '#BtnDelReli', function (){
	var ReliId = $(this).attr("attr-id");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/religion/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':ReliId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/religion';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/* ELIMINAR GENERO */
window.$(document).on('click', '#BtnDelGen', function (){
	var GenId = $(this).attr("attr-id");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/generos/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':GenId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/generos';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/* ELIMINAR PROFESION */
window.$(document).on('click', '#BtnDelProfes', function (){
	var ProfesId = $(this).attr("attr-id");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/profesiones/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':ProfesId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/profesiones';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/* ELIMINAR ESPECIALIDAD */
window.$(document).on('click', '#BtnDelEspeci', function (){
	var EspeciId = $(this).attr("attr-id");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/especialidades/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':EspeciId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/especialidades';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/* ELIMINAR TIPO DOCUMENTO */
window.$(document).on('click', '#BtnDelTpDocu', function (){
	var TpDocuId = $(this).attr("attr-id");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/tipodocumentos/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':TpDocuId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/tipodocumentos';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/* ELIMINAR ESTADO CIVIL */
window.$(document).on('click', '#BtnDelEstCiv', function (){
	var EstCivId = $(this).attr("attr-id");
	swal({
		title: "¿Está seguro de eliminar el registro?",
		text: 'Después de eliminado, no se podrá recuperar la información',
		icon: "warning",
		buttons: ["Cancelar", "Aceptar"],
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url: "/tutoriaweb/public/estadocivil/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':EstCivId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = '/tutoriaweb/public/estadocivil';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

// Bulma NavBar Burger Script
document.addEventListener('DOMContentLoaded', function () {
    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    
    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {
        
        // Add a click event on each of them
        $navbarBurgers.forEach(function ($el) {
            $el.addEventListener('click', function () {
                
                // Get the target from the "data-target" attribute
                let target = $el.dataset.target;
                let $target = document.getElementById(target);
                
                // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                $el.classList.toggle('is-active');
                $target.classList.toggle('is-active');
                
            });
        });
    }
    
});