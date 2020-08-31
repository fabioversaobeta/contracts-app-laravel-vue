import Contract from "@/interfaces/Contract";

// state
const state = () => ({
    contracts: [] as Contract[],
    contract: {} as Contract
});

// getters
const getters = {
    getContracts(state) {
        return state.contracts;
    },
    getContract(state) {
        return state.contract;
    }
};

// mutations
const mutations = {
    setContracts(state, contracts: Contract[]) {
        state.contracts = contracts;
    },

    setContract(state, contract: Contract) {
        state.contract = contract;
    }
};

// actions
const actions = {
    async fetchContracts(context) {
        const data = [] as Contract[];
        context.commit("setContracts", data);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
