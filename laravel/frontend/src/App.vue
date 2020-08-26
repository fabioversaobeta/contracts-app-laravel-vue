<template>
    <div id="app">
        <Header />
        <Breadcrumb />

        <router-view />
    </div>
</template>

<script>
import Header from "@/modules/Layout/components/Header/Header";
import Breadcrumb from "@/modules/Layout/components/Breadcrumb/Breadcrumb";

export default {
    name: "App",
    components: {
        Header,
        Breadcrumb
    },
    data() {
        return {};
    }
};
</script>

<style lang="scss">
#app {
    width: 100%;
    background: #ffffff;

    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
}

</style>
