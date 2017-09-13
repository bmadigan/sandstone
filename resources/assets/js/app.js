
require('./bootstrap');
window.Vue = require('vue');

// Global Event Listeners
window.events = new Vue();
window.flash = function (message, css) {
    window.events.$emit('flash', message, css);
};

Vue.component('flash', require('./components/Ui/Flash.vue'));
Vue.component('ContractList', require('./components/Modules/Contracts/ContractList.vue'));
Vue.component('ProductListings', require('./components/Modules/Products/ProductListings.vue'));
Vue.component('ShoppingCart', require('./components/Modules/Cart/ShoppingCart.vue'));

Vue.filter('currency', (value) => {
    return '$' + (value / 100).toFixed(2);
})

const app = new Vue({
    el: '#app'
});
