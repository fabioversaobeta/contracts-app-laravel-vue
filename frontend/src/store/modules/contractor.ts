import Contractor from "@/interfaces/Contractor";

// state
const state = () => ({
    contractors: [] as Contractor[],
    contractor: {} as Contractor
});

// getters
const getters = {
    getContractors(state) {
        return state.contractors;
    },
    getContractor(state) {
        return state.contractor;
    }
};

// mutations
const mutations = {
    setContractors(state, contractors: Contractor[]) {
        state.contractors = contractors;
    },

    setContractor(state, contractor: Contractor) {
        state.contractor = contractor;
    }
};

// actions
const actions = {
    async fetchContractors(context) {
        const data = [] as Contractor[];
        context.commit("setContractors", data);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
