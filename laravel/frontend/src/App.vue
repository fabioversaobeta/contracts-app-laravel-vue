<template>
    <div id="app">
        <Menu />
        <div class="main">
            <Header />
            <Navegation />
            <router-view />
        </div>
    </div>
</template>

<script>
import Menu from "@/modules/Layout/components/Menu/Menu";
import Header from "@/modules/Layout/components/Header/Header";
import Navegation from "@/modules/Layout/components/Navegation/Navegation";

export default {
    name: "App",
    components: {
        Menu,
        Header,
        Navegation
    },
    data() {
        return {};
    }
};
</script>

<style lang="scss">
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;

    width: 100%;
    display: flex;
}

.main {
    width: 100%;
    position: relative;
    background: #343a40;
    flex: 1;
}
</style>
