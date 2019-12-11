
window.Vue = require('vue');
window.eventBus = new Vue()

import globalMixins from './mixins/global'
import swal from './plugins/swal'
import toastr from './plugins/toastr'
import VeeValidate from 'vee-validate'
import VueFlashMessage from 'vue-flash-message';

require('./bootstrap')
require('vue-flash-message/dist/vue-flash-message.min.css');


window.Vue = require('vue')
window.eventBus = new Vue()

require('./ui')
Vue.use(swal)
Vue.use(toastr)
Vue.use(VeeValidate)
Vue.use(VueFlashMessage);


Vue.component('admin-auth-signin', require('./components/backend/auth/signin'))
Vue.component('admin-reset-password', require('./components/backend/auth/reset-password'))
Vue.component('admin-forgot-password', require('./components/backend/auth/forgot-password'))

const app = new Vue({
    el: '#app'
});
