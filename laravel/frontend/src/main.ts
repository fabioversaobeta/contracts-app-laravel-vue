import Vue from "vue";
import App from "./App.vue";
import "./registerServiceWorker";
import router from "./router";
import store from "./store";
import feather from "vue-icon";
import Vuelidate from "vuelidate";
import VTooltip from "v-tooltip";
// import VueUUID from "vue-uuid";

import "./assets/styles/geral.scss";

Vue.config.productionTip = false;

Vue.use(feather, "v-icon");
Vue.use(Vuelidate);
Vue.use(VTooltip);
// Vue.use(VueUUID);

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount("#app");
