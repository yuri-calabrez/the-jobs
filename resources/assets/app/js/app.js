import VeeValidate from 'vee-validate';
require('./bootstrap');

window.Vue = require('vue');

Vue.use(VeeValidate);

Vue.component('resume-component', require('./components/Candidate/ResumeComponent.vue'));

const app = new Vue({
    el: '#app'
});
