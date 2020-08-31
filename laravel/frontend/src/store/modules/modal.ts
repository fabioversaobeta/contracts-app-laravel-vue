import Property from '@/interfaces/Property'

// state
const state = () => ({
  showModalProperty: false
})

// getters
const getters = {
  getShowModalProperty (state: any) {
    return state.showModalProperty
  }
}

// mutations
const mutations = {
  setShowModalProperty (state: any, showModalProperty: boolean) {
    state.showModalProperty = showModalProperty
  }
}

// actions
const actions = {
  toggleShowModalProperty (context: any) {
    const showModal = context.state.showModalProperty

    context.commit('setShowModalProperty', !showModal)
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}
