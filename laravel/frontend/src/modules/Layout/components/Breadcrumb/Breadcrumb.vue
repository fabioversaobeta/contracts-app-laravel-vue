<template>
    <div class="breadcrumb">
        <div class="content">
            <div id="nav">
                <router-link to="/">Imóveis</router-link> |
                <router-link to="/about">About</router-link>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
export default {
    name: "Breadcrumb",
    methods: {}
};
</script>

<style lang="sass">
@import "./Breadcrumb.scss"
</style>
