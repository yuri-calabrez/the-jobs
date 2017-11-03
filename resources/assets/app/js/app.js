require('./bootstrap');

window.Vue = require('vue');


Vue.component('resume-component', require('./components/Candidate/ResumeComponent.vue'));

const app = new Vue({
    el: '#app'
});
