window._ = require('lodash');
window.Popper = require('popper.js').default;
window.swal = require('sweetalert');

window.$ = window.jQuery = require('jquery');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

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
			url: "/roles/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':RolId},
			success: function(data){
				var arrayDatos = $.map(data, function(value, index) {
                    return [value];
                });
				
				if (arrayDatos[0] != "" & arrayDatos[0] != null){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = 'roles';
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
			url: "/funciones/eliminar",
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
						location.href = 'funciones';
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
			url: "/paises/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':PaisId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = 'paises';
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
			url: "/ciudades/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':CiuId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = 'ciudades';
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
			url: "/prepagada/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':PrepaId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = 'prepagada';
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
			url: "/eps/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':EpsId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = 'eps';
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
			url: "/barrios/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'cod_ciudad':CiuId,'cod_barrio':BarId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = 'barrios';
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
			url: "/sedes/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':SedeId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = 'sedes';
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
			url: "/jornadas/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':JorId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = 'jornadas';
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
			url: "/grados/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':GradId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = 'grados';
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
			url: "/etnias/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':EtniId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = 'etnias';
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
			url: "/aseguradora/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':AsegId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = 'aseguradora';
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
			url: "/religion/eliminar",
			dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
			method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
			data: {'id':ReliId},
			success: function(data){
				if (data = 1){				
					swal("Registro eliminado correctamente!", "", "success")
					.then((value) => {
						location.href = 'religion';
					});	
				} else {
					swal("Error al eliminar el registro!", "", "warning");
				}
			}
		});
	}
	});	
});

/*Hamburger mobile*/

document.addEventListener('DOMContentLoaded', () => {

    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
  
    if ($navbarBurgers.length > 0) {
  
      $navbarBurgers.forEach( el => {
        el.addEventListener('click', () => {
  
          const target = el.dataset.target;
          const $target = document.getElementById(target);
  
          el.classList.toggle('is-active');
          $target.classList.toggle('is-active');
  
        });
      });
    }
  
  });