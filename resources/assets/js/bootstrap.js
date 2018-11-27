window._ = require('lodash');
window.Popper = require('popper.js').default;
window.swal = require('sweetalert');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    //require('bootstrap');
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

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

/* Cerrar Notificaciones de bulma */

window.$(document).on('click', '.notification > button.delete', function() {
    $(this).parent().addClass('is-hidden');
    return false;
});

/* Deshabilitar boton de  guardar*/
$('#btnBeneficiario').attr("disabled", true);

/* Validacion de direccion del beneficiario */

window.$(document).on('click', '#confirmarDireccion', function(){
    //Capturar valores del select
    var step1 = $('#step1 option:selected').text();
    var step1index = $('#step1 option:selected').index();
    var step2 = $("#step2").val();
    var step3 = $("#step3").val();
    var step4 = $("#step4").val();
    
    // Armar texto campo direccion
    var address = step1.concat(' ', step2, ' #', step3, '-', step4);

    /* Validaciones a los input y al select */ 
    if(step1index !== 0){
        if(step2.length > 0 && step3.length > 0 && step4.length > 0) {
            /* activar el input y asignar valor para que laravel lo pueda capturar */
            $('#direccionBeneficiario').removeAttr("disabled");
            $('#direccionBeneficiario').attr('readonly',true);
            $('#direccionBeneficiario').val(address);

            /*  peticion ajax para validar si la direccion existe en la base de datos */
            $.ajax({
                url: "/beneficiarios/validardireccion", 
                dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
                method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
                data: {'direccion':address}, //parametros GET o POST 
                success: function(response) {
                    if(response === 1){
                        swal({
                            title: "Hay un beneficiario registrado con la misma direccion!",
                            text: "¿desea registrar este beneficiario con la misma direccion?",
                            icon: "warning",
                            buttons: ["Volver", "Continuar"],
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $('#btnBeneficiario').removeAttr('disabled');
                            } 
                        });                       
                    }
                    else {
                        $('#btnBeneficiario').removeAttr('disabled');
                    }
                }
            });
        } else {                      
            window.swal('Debe de llenar completos los campos de la direccion');
        }
    } else {
        window.swal('Debe de seleccionar una opción entre avenida, calle, carrera, diagonal o trasversal');
    }    
    
});

window.$(document).on('change', '#selectBeneficiario', function(){
    var beneficiario = $('#selectBeneficiario option:selected').val();

    $.ajax({
        url: "/ayudas/validarayuda",
        dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
        method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
        data: {'id_beneficiario':beneficiario},
        success: function(response){
            
            if(!$.isEmptyObject(response)){
                console.log(response);
                swal({
                    title: "Encontramos una ayuda brindada",
                    text: 'La ultima ayuda entregada fue el ' + response.fecha_ayuda,
                    icon: "warning",
                    button: "Aceptar",
                });
            }
            
            
        },
        error: function(errorThrown){
            alert(errorThrown);
            swal("Encontramos un error al tratar de traer los datos del beneficiario!");
        }  
    });
});
