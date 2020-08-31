import Property from "@/interfaces/Property";
import axios from "axios";

// state
const state = () => ({
    properties: [] as Property[],
    property: {} as Property,
    forDelete: Number
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
                p.contract !== null
                    ? "<span class='success'>Contratado</span>"
                    : "<span class='error'>Não contratado</span>";

            return {
                email: p.email,
                endereco: `${p.street}, ${p.number}, ${p.city}, ${p.state}`,
                status,
                action: "delete_property"
            };
        });
    },
    getProperty(state) {
        return state.property;
    },
    getForDelete(state) {
        return state.forDelete;
    }
};

// mutations
const mutations = {
    setProperties(state, properties: Property[]) {
        state.properties = properties;
    },

    setProperty(state, property: Property) {
        state.property = property;
    },

    setForDelete(state, forDelete: number) {
        state.forDelete = forDelete;
    }
};

// actions
const actions = {
    async fetchProperties(context) {
        console.log("fetchProperties");

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
        console.log("data", data);

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
    },
    forDelete(context, propertyIndex: number) {
        console.log("forDelete", propertyIndex);
        context.commit("setForDelete", propertyIndex);
    },
    removeProperty(context) {
        const propertyIndex = context.state.forDelete;
        console.log("removeProperty", propertyIndex)

        if (!propertyIndex) {
            return false;
        }
        // const propertyIndex = context.state.properties.findIndex(
        //     (property: Property) => property.id === id
        // );
        let idProperty;

        const properties = context.state.properties.filter(
            (p: Property, i: number) => {
                if (i === propertyIndex) {
                    idProperty = p.id;
                    return false;
                }
                return true;
            }
        );

        if (!idProperty) {
            return false;
        }

        context.commit("setProperties", properties);

        axios.delete(`http://127.0.0.1:8000/api/property/${idProperty}`);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
