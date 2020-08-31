<template>
    <div class="dashboard">
        <Table :headers="headers" :items="properties" />
        <Modal v-show="showModal" @close="toggleShowModalProperty">
            <h3 slot="header">Cadastrar Imóvel</h3>
            <FormAddProperty slot="body" />
        </Modal>
    </div>
</template>

<script>
import Table from '@/components/Table/Table'
import Modal from '@/components/Modal/Modal'
import FormAddProperty from '@/modules/Property/components/FormAddProperty/FormAddProperty'
import { mapGetters, mapActions } from 'vuex'

export default {
    name: "Dashboard",
    components: {
        Table,
        Modal,
        FormAddProperty
    },
    data() {
        return {
            headers: ['Email', 'Endereco', 'Status', 'Ações']
        };
    },
    mounted () {
        this.fetchProperties()
    },
    computed: {
        ...mapGetters('property', {
            properties: 'getPropertiesItems'
        }),
        ...mapGetters('modal', {
            showModal: 'getShowModalProperty'
        })
    },
    methods: {
        ...mapActions('property', [
            'fetchProperties'
        ]),
        ...mapActions('modal', [
            'toggleShowModalProperty'
        ])
    }
};
</script>


<style lang="sass">
  @import "./Dashboard.scss"
</style>
