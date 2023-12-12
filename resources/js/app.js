require('./bootstrap');

import 'fullcalendar/dist/fullcalendar.css';
import FullCalendar from 'vue-full-calendar';
import 'vuejs-datatable/dist/themes/bootstrap-4.esm';
import { VuejsDatatableFactory } from 'vuejs-datatable';
import VueResource from 'vue-resource';
import "jquery/dist/jquery.min.js";
import "bootstrap/dist/css/bootstrap.min.css";
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import VueRouter from 'vue-router';
import routes from './router/index.js';

const plugin_use = [FullCalendar, VuejsDatatableFactory, VueResource, VueRouter];

window.Vue = require('vue').default; 

plugin_use.forEach((item)=>{
    Vue.use(item);
})

Vue.component('calendar-component', require('./components/CalendarComponent.vue').default);
Vue.component('datatable-component', require('./components/DatatableComponent.vue').default);
Vue.component('like-component', require('./components/LikeComponent.vue').default);
Vue.component('dislike-component', require('./components/DislikeComponent.vue').default);
Vue.component('infinite-scroll-component', require('./components/InfiniteScrollComponent.vue').default);
Vue.component('InfiniteLoading', require('vue-infinite-loading'));
Vue.component('search-component', require('./components/SearchComponent.vue').default);
Vue.component('datatabel-component', require('./components/datatabelComponent.vue').default);
Vue.component('navigasi-component', require('./components/NavigasiComponent.vue').default);
Vue.component('password-checker', require('./components/PasswordCheckerComponent.vue').default);
Vue.component('is-typing', require('./components/IsTypingComponent.vue').default);
Vue.component('blog', require('./components/BlogDataTableComponent.vue').default);

const app = new Vue({
    el: '#app',
    router:new VueRouter(routes)
});