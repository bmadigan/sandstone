
require('./bootstrap');
window.Vue = require('vue');

// Global Event Listeners
window.events = new Vue();
window.flash = function (message, css) {
    window.events.$emit('flash', message, css);
};

Vue.component('flash', require('./components/Utilities/Flash.vue'));
Vue.component('ContractList', require('./components/Modules/Contracts/ContractList.vue'));

const app = new Vue({
    el: '#app'
});
