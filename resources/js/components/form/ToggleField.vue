<template>
    <div>
        <SwitchGroup>
            <div class="flex items-center">
                <Switch
                    :id="name"
                    :name="name"
                    :label="mlabel"
                    aria-invalid="true"
                    :aria-describedBy="name"
                    as="template"
                    v-slot="{ checked }"
                    v-model="value"
                    value="true"
                >
                    <slot :checked="checked" :label="label"></slot>
                </Switch>
                <SwitchLabel class="ml-4" v-if="label">{{ label }}</SwitchLabel>
                <SwitchLabel class="ml-4" passive>
                    <a class="px-1 -m-1 underline rounded hover:text-primary focus:outline-none focus-visible:ring-2 focus-visible:ring-primary" target="_blank" :href="link">
                        {{ linkTitle }}
                    </a>
                </SwitchLabel>
            </div>
        </SwitchGroup>
        <ErrorMessage :name="name">
            {{ errorMessage }}
        </ErrorMessage>
    </div>
</template>


<script setup>
import {defineProps, ref, watch} from "vue";
import { Switch, SwitchGroup, SwitchLabel } from '@headlessui/vue';
import { useField } from "vee-validate";

const props = defineProps({
    modelValue: {
        type: null,
    },
    name: {
        type: String,
        default: null,
    },
    mlabel: {
        type: String,
        default: null,
    },
    label: {
        type: String,
        default: null,
    },
    link: {
        type: String,
        default: null,
    },
    linkTitle: {
        type: String,
        default: null,
    },
    rules: {
        type: null,
        default: null,
    },
});

const emit = defineEmits(["update:modelValue"]);

const { value, errorMessage } = useField(props.name, props.rules,{
    initialValue: props.modelValue,
    label: props.mlabel,
});

watch(value, (newValue) => {
    emit("update:modelValue", newValue);
});


</script>
