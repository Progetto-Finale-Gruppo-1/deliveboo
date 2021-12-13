window.Vue = require('vue');
window.axios = require('axios');

Vue.component('show-component', require('./components/Show.vue').default);
Vue.component('app-component', require('./components/App.vue').default);

const app = new Vue({
    el: '#app',
});