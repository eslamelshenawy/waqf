
import Vue from "vue";
import App from './components/App';
import SubscribeForm from './components/SubscribeForm.vue';

// window.Vue = require('vue');

// Vue.component('subscribeForm', require('./components/SubscribeForm.vue'));


const app = new Vue({
    el: '#foot',
    components: {
        'subscribe-form': SubscribeForm
    }
});