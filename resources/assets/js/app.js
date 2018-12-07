
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');



window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('tabla-roles', require('./components/TableRolesComponent.vue'));
Vue.component('tabla-funciones', require('./components/TableFuncionesComponent.vue'));
Vue.component('tabla-paises', require('./components/TablePaisesComponent.vue'));
Vue.component('tabla-ciudades', require('./components/TableCiudadesComponent.vue'));
Vue.component('tabla-prepagada', require('./components/TablePrepagadaComponent.vue'));
Vue.component('tabla-eps', require('./components/TableEpsComponent.vue'));
Vue.component('tabla-barrios', require('./components/TableBarriosComponent.vue'));
Vue.component('tabla-sedes', require('./components/TableSedesComponent.vue'));
Vue.component('tabla-jornadas', require('./components/TableJornadasComponent.vue'));
Vue.component('tabla-grados', require('./components/TableGradosComponent.vue'));
Vue.component('tabla-etnias', require('./components/TableEtniasComponent.vue'));
Vue.component('tabla-religiones', require('./components/TableReligionComponent.vue'));
Vue.component('tabla-aseguradoras', require('./components/TableAseguradoraComponent.vue'));


const app = new Vue({
    el: '#app'
});
