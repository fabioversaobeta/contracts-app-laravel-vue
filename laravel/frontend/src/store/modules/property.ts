import Property from '@/interfaces/Property'
import axios from 'axios'

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
  getPropertiesItems (state: any) {
    return state.properties.map((p: Property) => {
        const status = p.contract !== undefined
            ? '<span class="success">Contratado</span>'
            : '<span class="error">Não contratado</span>'

        return {
            email: p.email,
            endereco: `${p.street}, ${p.number}, ${p.city}, ${p.state}`,
            status,
            action: 'delete'
        }
    })
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
    let data = [] as Property[]

    await axios.get('http://127.0.0.1:8000/property')
      .then(response => {
        data = response.data
      })
      .catch(error => {
        console.log('fetchProperties', error)
      })

    if (data.length === 0) {
      return false
    }

    context.commit('setProperties', data)
  },
  async createProperty (context: any, property: Property) {
    let data = [] as Property[]

    await axios.post('http://127.0.0.1:8000/property', property)
      .then(response => {
        data = response.data
      })
      .catch(error => {
        console.log('fetchProperties', error)
      })

    if (data.length === 0) {
        return false
    }

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
