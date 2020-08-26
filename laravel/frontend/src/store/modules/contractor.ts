import Contractor from '@/interfaces/Contractor'

// state
const state = () => ({
  contractors: [] as Contractor[],
  contractor: {} as Contractor
})

// getters
const getters = {
  getContractors (state: any) {
    return state.contractors
  },
  getContractor (state: any) {
    return state.contractor
  }
}

// mutations
const mutations = {
  setContractors (state: any, contractors: Contractor[]) {
    state.contractors = contractors
  },

  setContractor (state: any, contractor: Contractor) {
    state.contractor = contractor
  }
}

// actions
const actions = {
  async fetchContractors (context: any) {
    const data = [] as Contractor[]
    context.commit('setContractors', data)
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}
