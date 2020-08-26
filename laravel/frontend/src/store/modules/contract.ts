import Contract from '@/interfaces/Contract'

// state
const state = () => ({
  contracts: [] as Contract[],
  contract: {} as Contract
})

// getters
const getters = {
  getContracts (state: any) {
    return state.contracts
  },
  getContract (state: any) {
    return state.contract
  }
}

// mutations
const mutations = {
  setContracts (state: any, contracts: Contract[]) {
    state.contracts = contracts
  },

  setContract (state: any, contract: Contract) {
    state.contract = contract
  }
}

// actions
const actions = {
  async fetchContracts (context: any) {
    const data = [] as Contract[]
    context.commit('setContracts', data)
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}
