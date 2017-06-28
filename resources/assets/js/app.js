
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

require('./libs/core-ui.js');
require('./libs/a_delete_method.js');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
window.RecaptchaSiteKey = '6LfJyiYUAAAAAGxmE-7oF5ckOgn6mtGC1Qmy80wu';

import Form from './libs/Form.js';
window.Form = Form;

Vue.component('auth-panel', require('./components/auth/AuthPanel.vue'));
Vue.component('reset-password-form', require('./components/auth/ResetPasswordForm.vue'));

const app = new Vue({
    el: '#app'
});
