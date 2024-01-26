<template>
    <div>
        <slot></slot>
    </div>
</template>


<script setup>
import { ref, onMounted } from "vue";
import { required, email } from "@vee-validate/rules";

/*
export default {
    components: {
        Field,
        ErrorMessage,
    },
    props: {
        modelValue: {
            type: null,
        },
        inputType: {
            type: String,
            required: true,
        },
        handle: {
            type: String,
            required: true,
        },
        rules: {
            type: null,
            default: undefined,
        },
        placeholder: {
            type: String,
            required: false,
            default: "",
        },
    },
    setup(props, { emit }) {
        /*const { value, errorMessage } = useField(props.handle, props.rules, {
            initialValue: props.modelValue,
        });

        return {
            value,
            errorMessage,
        };
    },
};*/
</script>
