require("./bootstrap");

window.Vue = require("vue");

Vue.component("certificate", require("./components/Certificate.vue").default);
Vue.component("certify", require("./components/Certify.vue").default);

const app = new Vue({
    el: "#app"
});
