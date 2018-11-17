
require('./bootstrap');

window.Vue = require('vue');
//Imports ::

//vForm
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

//Moments
import moment from 'moment';
Vue.filter('timeDate', function(created){
    return moment(created).format('MMMM Do YYYY');
 })

//VueRouter
import VueRouter from 'vue-router'
Vue.use(VueRouter)
let routes = [

]

const router = new VueRouter({
    mode: 'history',
    routes 
})

//Componentes ::
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
const app = new Vue({
    el: '#app',
    router
});
