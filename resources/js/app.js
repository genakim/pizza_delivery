/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import vuetify from './vuetify'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('product', require('./components/Product.vue').default);
Vue.component('cart', require('./components/Cart.vue').default);
Vue.component('order-list', require('./components/OrderList.vue').default);
Vue.component('header-cart', require('./components/HeaderCart.vue').default);
Vue.component('app-header', require('./layouts/Header.vue').default);
Vue.component('app-footer', require('./layouts/Footer.vue').default);
Vue.component('order-form', require('./components/OrderForm.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    vuetify,
    el: '#app',
    data: {
        breadcrumbs: []
    }
});
