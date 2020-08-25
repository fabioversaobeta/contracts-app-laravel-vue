<template>
    <div id="app">
        <MenuLeft />
        <div class="main">
            <Header />
            <Navegation />
            <router-view />
        </div>
    </div>
</template>

<script>
import MenuLeft from "@/modules/Layout/components/MenuLeft/MenuLeft";
import Header from "@/modules/Layout/components/Header/Header";
import Navegation from "@/modules/Layout/components/Navegation/Navegation";

export default {
    name: "App",
    components: {
        MenuLeft,
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
    text-align: center;
    color: #2c3e50;
}

#nav {
    padding: 30px;

    a {
        font-weight: bold;
        color: #2c3e50;

        &.router-link-exact-active {
            color: #42b983;
        }
    }
}
</style>
