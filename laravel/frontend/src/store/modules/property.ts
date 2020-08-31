import Property from "@/interfaces/Property";
import axios from "axios";

// state
const state = () => ({
    properties: [] as Property[],
    property: {} as Property
});

// getters
const getters = {
    getProperties(state) {
        return state.properties;
    },
    getPropertiesItems(state) {
        const properties = state.properties;

        if (properties.length === 0) {
            return [];
        }

        return properties.map((p: Property) => {
            const status =
                p.contract !== undefined
                    ? "<span class='success'>Contratado</span>"
                    : "<span class='error'>Não contratado</span>";

            return {
                email: p.email,
                endereco: `${p.street}, ${p.number}, ${p.city}, ${p.state}`,
                status,
                action: "delete"
            };
        });
    },
    getProperty(state) {
        return state.property;
    }
};

// mutations
const mutations = {
    setProperties(state, properties: Property[]) {
        state.properties = properties;
    },

    setProperty(state, property: Property) {
        state.property = property;
    }
};

// actions
const actions = {
    async fetchProperties(context) {
        let data = [] as Property[];

        await axios
            .get("http://127.0.0.1:8000/api/property")
            .then(response => {
                data = response.data;
            })
            .catch(error => {
                console.log("fetchProperties", error);
            });

        if (data.length === 0) {
            return false;
        }

        context.commit("setProperties", data);
    },
    async createProperty(context, property: Property) {
        let data = [] as Property[];

        await axios
            .post("http://127.0.0.1:8000/api/property", property)
            .then(response => {
                data = response.data;
            })
            .catch(error => {
                console.log("fetchProperties", error);
            });

        if (data.length === 0) {
            return false;
        }

        const properties = context.state.properties;

        properties.push(data);

        context.commit("setProperties", properties);

        return true;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
