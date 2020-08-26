import Vue from "vue";
import Vuex from "vuex";

import contract from './modules/contract'
import contractor from './modules/contractor'
import property from './modules/property'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {},
    mutations: {},
    actions: {},
    modules: {
        contract,
        contractor,
        property
    }
});
