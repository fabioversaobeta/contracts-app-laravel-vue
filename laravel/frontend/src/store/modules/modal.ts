// state
const state = () => ({
    showModalProperty: false
});

// getters
const getters = {
    getShowModalProperty(state) {
        return state.showModalProperty;
    }
};

// mutations
const mutations = {
    setShowModalProperty(state, showModalProperty: boolean) {
        state.showModalProperty = showModalProperty;
    }
};

// actions
const actions = {
    toggleShowModalProperty(context) {
        const showModal = context.state.showModalProperty;

        context.commit("setShowModalProperty", !showModal);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
