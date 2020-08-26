import Property from '@/interfaces/Property'

// state
const state = () => ({
  properties: [] as Property[],
  property: {} as Property
})

// getters
const getters = {
  getProperties (state: any) {
    return state.properties
  },
  getProperty (state: any) {
    return state.property
  }
}

// mutations
const mutations = {
  setProperties (state: any, properties: Property[]) {
    state.properties = properties
  },

  setProperty (state: any, property: Property) {
    state.property = property
  }
}

// actions
const actions = {
  async fetchProperties (context: any) {
    const data = [] as Property[]
    context.commit('setProperties', data)
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}
