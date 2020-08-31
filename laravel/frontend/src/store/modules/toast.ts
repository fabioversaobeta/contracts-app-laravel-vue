import Toast from '@/interfaces/Toast'
// state
const state = () => ({
  messagens: [] as Toast[]
})

// getters
const getters = {
  getMessages: (state: any) => {
    return state.messagens;
  }
}

// mutations
const mutations = {
  setMessages (state: any, messagens: Toast[]) {
    state.messagens = messagens;
  }
}

// actions
const actions = {
  setMessages ({ commit }, messagens: Toast[]) {
    commit('setMessages', messagens);
  },
  addMessage ({ commit, state }, message: Toast) {
    const msgs = state.messagens;
    msgs.push(message);
    commit('setMessages', msgs);
  },
  removeMessage ({ commit, state }, id: string) {
    const msgs = state.messagens.filter((m: Toast) => m.id !== id);
    commit('setMessages', msgs);
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}
