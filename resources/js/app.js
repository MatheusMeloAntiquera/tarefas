/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');



import Routes from '@/js/routes.js'

import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)

import VeeValidate, { Validator } from 'vee-validate';
import ptBR from 'vee-validate/dist/locale/pt_BR';

Vue.use(VeeValidate, {
    classes: true,
    classNames: {
        valid: 'is-valid',
        invalid: 'is-invalid'
    },

});

Validator.localize('pt_BR', ptBR);



import App from '@/js/App.vue';

const app = new Vue({
    router: Routes,
    el: '#app',
    render: h => h(App),
});
