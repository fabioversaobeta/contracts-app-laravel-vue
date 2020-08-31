<template>
    <div class="header">
        <div class="content">
            <div class="user">
                <div class="avatar">U</div>
                <span class="name">User</span>
            </div>
            <div class="buttons">
                <button class="new-order" @click="toggleShowModalProperty">
                    <v-icon name="plus-circle"></v-icon> Novo Imóvel
                </button>
                <!-- <button class="new-product" v-if="$route.name === 'Products'">
            New Product
          </button> -->
            </div>
        </div>
    </div>
</template>

<style lang="sass">
@import "./Header.scss"
</style>

<script lang="ts">
import { mapActions } from 'vuex'

export default {
    name: "Header",
    methods: {
        ...mapActions('modal', [
            'toggleShowModalProperty'
        ])
    }
};
</script>
