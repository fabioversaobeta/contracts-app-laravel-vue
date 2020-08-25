<template>
    <div class="header">
        <div class="items-left">
            <button class="menu">
                <i class="material-icons">menu</i>
            </button>
            <a href="/">Home</a>
            <a href="/contato">Contato</a>
            <input type="text" />
        </div>
        <div class="items-right">
            <button class="message">
                <i class="material-icons">message</i>
            </button>
            <button class="notification">
                <i class="material-icons">notifications_none</i>
            </button>
        </div>
    </div>
</template>

<script lang="ts">
export default {
    name: "Header",
    methods: {}
};
</script>

<style lang="sass">
@import "./Header.scss"
</style>
