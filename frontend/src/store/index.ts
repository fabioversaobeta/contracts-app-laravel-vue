import Vue from "vue";
import Vuex from "vuex";

import contract from "./modules/contract";
import contractor from "./modules/contractor";
import property from "./modules/property";
import modal from "./modules/modal";
import toast from "./modules/toast";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {},
    mutations: {},
    actions: {},
    modules: {
        contract,
        contractor,
        property,
        modal,
        toast
    }
});
