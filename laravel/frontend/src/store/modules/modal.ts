// state
const state = () => ({
    showModalProperty: false,
    showModalRemoveProperty: false
});

// getters
const getters = {
    getShowModalProperty(state) {
        return state.showModalProperty;
    },
    getShowModalRemoveProperty(state) {
        return state.showModalRemoveProperty;
    }
};

// mutations
const mutations = {
    setShowModalProperty(state, showModalProperty: boolean) {
        state.showModalProperty = showModalProperty;
    },
    setShowModalRemoveProperty(state, showModalRemoveProperty: boolean) {
        state.showModalRemoveProperty = showModalRemoveProperty;
    }
};

// actions
const actions = {
    toggleShowModalProperty(context) {
        const showModal = context.state.showModalProperty;

        context.commit("setShowModalProperty", !showModal);
    },
    toggleShowModalRemoveProperty(context) {
        const showModal = context.state.showModalRemoveProperty;

        context.commit("setShowModalRemoveProperty", !showModal);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
