<template>
    <div class="form-group" :class="{ hasError: v.$error }">
        <input
            type="text"
            class="input"
            v-model="name"
            autocomplete="off"
            placeholder=""
            @input="v.$touch()"
            :class="{ error: v.$error && !v.required }"
            v-tooltip="'my text'"
        />
    </div>
</template>

<script>
import upperFirst from "lodash/upperFirst";

export default {
    props: {
        value: {
            type: String,
            default: ""
        },
        v: {
            type: Object,
            required: true
        }
    },
    computed: {
        name: {
            get() {
                return this.value;
            },
            set(value) {
                this.$emit("input", value);
            }
        }
    }
};
</script>

<style>
.error {
    border: 1px red solid !important;
}
</style>
