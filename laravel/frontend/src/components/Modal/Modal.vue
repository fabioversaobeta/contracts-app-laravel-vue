<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="close">
                        <button @click="toggleShowModalProperty">
                            X
                        </button>
                    </div>
                    <div class="modal-header">
                        <slot name="header" />
                    </div>

                    <div class="modal-body">
                        <slot name="body" />
                    </div>

                    <div class="modal-footer">
                        <slot name="footer" />
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
import { mapActions } from "vuex";

export default {
    name: "Modal",
    methods: {
        ...mapActions("modal", ["toggleShowModalProperty"])
    }
};
</script>

<style lang="sass">
@import "./Modal.scss"
</style>
