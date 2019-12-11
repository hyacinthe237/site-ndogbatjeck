
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import globalMixins from './mixins/global'
import swal from './plugins/swal'
import toastr from './plugins/toastr'

require('./bootstrap')

window.Vue = require('vue')
window.eventBus = new Vue()

import VeeValidate from 'vee-validate'

Vue.use(swal)
Vue.use(toastr)
Vue.use(VeeValidate)

require('./ui')
require('./commons')

Vue.component('eggs', require('./components/frontend/landing/eggs'))
Vue.component('life-units', require('./components/frontend/life-units/life-units'))
Vue.component('slider-events', require('./components/frontend/slider-events/slider-events'))
Vue.component('comments', require('./components/frontend/comments/comments'))
Vue.component('fonction', require('./components/frontend/activites/fonction/fonction'))


const app = new Vue({
    el: '#app'
})
