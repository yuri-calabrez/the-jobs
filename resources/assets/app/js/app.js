import VeeValidate, {Validator} from 'vee-validate';
import VeeValidateMessageBr from 'vee-validate/dist/locale/pt_BR'
require('./bootstrap');

window.Vue = require('vue');
Validator.localize('pt_BR', VeeValidateMessageBr);
Vue.use(VeeValidate, {locale: 'pt_BR'});

Vue.component('resume-component', require('./components/Candidate/ResumeComponent.vue'));

const app = new Vue({
    el: '#app'
});
