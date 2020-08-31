<template>
    <div role="form" id="contact-info" aria-label="Contact information">
        <div class="show" v-show="!loading">
            <div class="columns">
                <div class="column">
                    <label for="email">Email*</label>
                    <Input v-model="property.email" :v="$v.property.email" />

                    <label for="street">Rua*</label>
                    <Input v-model="property.street" :v="$v.property.street" />

                    <label for="number">Número</label>
                    <input
                        id="number"
                        name="number"
                        autocomplete="number"
                        autocorrect="off"
                        type="text"
                        v-model="property.number"
                        required
                    />

                    <label for="complement">Complemento</label>
                    <input
                        id="complement"
                        name="complement"
                        autocomplete="complement"
                        autocorrect="off"
                        type="text"
                        v-model="property.complement"
                        required
                    />
                </div>
                <div class="column">
                    <label for="district">Bairro*</label>
                    <Input
                        v-model="property.district"
                        :v="$v.property.district"
                    />

                    <label for="city">Cidade*</label>
                    <Input v-model="property.city" :v="$v.property.city" />

                    <label for="state">Estado*</label>
                    <Input v-model="property.state" :v="$v.property.state" />
                </div>
            </div>
            <button
                type="submit"
                @click="cadastrar(property)"
                :disabled="$v.property.$invalid"
            >
                Cadastrar
            </button>
            <!-- </form> -->
        </div>
        <Loading class="center" v-show="loading" />
    </div>
</template>

<script>
import Loading from "@/components/Loading/Loading";
import Input from "@/components/Input/Input";

import { mapActions } from "vuex";
import { required, email } from "vuelidate/lib/validators";

export default {
    name: "FormAddProperty",
    components: {
        Loading,
        Input
    },
    data() {
        return {
            property: {},
            default: {
                email: "",
                street: "",
                number: "",
                complement: "",
                district: "",
                city: "",
                state: ""
            },
            loading: false
        };
    },
    validations: {
        property: {
            email: { required, email },
            street: { required },
            district: { required },
            city: { required },
            state: { required }
        }
    },
    methods: {
        ...mapActions("property", ["createProperty"]),
        ...mapActions("toast", ["addMessage"]),
        ...mapActions("modal", ["toggleShowModalProperty"]),
        cadastrar: async function(property) {
            console.log("cadastrar");
            if (this.loading) {
                return false;
            }

            this.$v.property.$touch();
            if (this.$v.property.$pending || this.$v.property.$error) return;

            this.loading = true;

            const status = await this.createProperty(property);

            this.property = this.default;
            // this.$v.$property.reset();
            this.$nextTick(() => {
                this.$v.property.$reset;
            });

            this.loading = false;

            this.toggleShowModalProperty();

            if (!status) {
                this.toastErroAddProperty();
                return
            }

            this.toastSucessoAddProperty();
        },
        toastErroAddProperty: function() {
            const msg = {
                type: "error",
                icon: "alert-circle",
                title: "Falha ao Cadastrar",
                description: "Não foi possível concluir o cadastro do Imóvel"
            };

            this.addMessage(msg);
        },
        toastSucessoAddProperty: function() {
            const msg = {
                type: "success",
                icon: "alert-circle",
                title: "Sucesso ao Cadastrar",
                description: "O Imóvel foi cadastrado com sucesso"
            };

            this.addMessage(msg);
        }
    }
};
</script>

<style lang="sass">
@import "./FormAddProperty.scss"
</style>
