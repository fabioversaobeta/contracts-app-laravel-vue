<template>
    <div class="dashboard">
        <Table :headers="headers" :items="properties" />
        <Modal
            v-show="showModalCreate"
            :toggleShowModal="toggleShowModalProperty"
            @close="toggleShowModalProperty"
        >
            <h3 slot="header">Cadastrar Imóvel</h3>
            <FormAddProperty slot="body" />
        </Modal>
        <Modal
            v-show="showModalRemove"
            :toggleShowModal="toggleShowModalRemoveProperty"
            @close="toggleShowModalRemoveProperty"
        >
            <h3 slot="header">Remover Imóvel</h3>
            <p slot="body">Deseja realmente remover esse Imóvel?</p>
            <button slot="footer" @click="remover">Confirmar Remoção</button>
        </Modal>
    </div>
</template>

<script>
import Table from "@/components/Table/Table";
import Modal from "@/components/Modal/Modal";
import FormAddProperty from "@/modules/Property/components/FormAddProperty/FormAddProperty";
import { mapGetters, mapActions } from "vuex";

export default {
    name: "Dashboard",
    components: {
        Table,
        Modal,
        FormAddProperty
    },
    data() {
        return {
            headers: ["Email", "Endereco", "Status", "Ações"],
            properties: []
        };
    },
    mounted() {
        this.fetchProperties();
    },
    computed: {
        ...mapGetters("property", ["getPropertiesItems"]),
        ...mapGetters("modal", {
            showModalCreate: "getShowModalProperty",
            showModalRemove: "getShowModalRemoveProperty"
        })
    },
    methods: {
        ...mapActions("property", ["fetchProperties", "removeProperty"]),
        ...mapActions("toast", ["addMessage"]),
        ...mapActions("modal", [
            "toggleShowModalProperty",
            "toggleShowModalRemoveProperty"
        ]),
        remover: function() {
            this.toggleShowModalRemoveProperty();
            this.removeProperty();
            this.addSuccessMessage();
        },
        addSuccessMessage: function() {
            const msg = {
                type: "success",
                icon: "alert-circle",
                title: "Sucesso em remover",
                description: "O Imóvel foi removido com sucesso"
            };

            this.addMessage(msg);
        }
    },
    watch: {
        getPropertiesItems: function() {
            this.properties = this.getPropertiesItems;
            console.log("properties", this.properties);
        }
    }
};
</script>

<style lang="sass">
@import "./Dashboard.scss"
</style>
