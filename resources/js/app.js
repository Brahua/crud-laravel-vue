
require('./bootstrap');

window.Vue = require('vue');


Vue.component('pensamiento', require('./components/PensamientoComponent.vue').default);
Vue.component('add-pensamiento', require('./components/AddPensamientoComponent.vue').default);
Vue.component('mis-pensamientos', require('./components/MisPensamientosComponent.vue').default);


const app = new Vue({
    el: '#app'
});
