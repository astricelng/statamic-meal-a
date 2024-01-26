<template>
    <!--div>
        <slot :selectedOption="selectedOption" :selectOption="selectOption"></slot>
    </div-->
<div class="relative w-72 z-10">
    <Listbox
        v-model="value"
        :name="name"
        :id="name"
        :label="label"
        aria-invalid="true"
        :aria-describedBy="name"
        :multiple="multiple"
    >
        <div class="relative mt-1">
            <ListboxButton
                class="relative w-full cursor-default rounded-lg bg-white py-2 pl-3 pr-10 text-left shadow-md focus:outline-none focus-visible:border-indigo-500 focus-visible:ring-2 focus-visible:ring-white/75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm"
            >
                <span class="block truncate">{{ selectedOption.length > 0 ? selectedOption.map(entry => entry).join(', ') : 'Select an option'}}</span>
                <span
                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2"
                >
                        <!--ChevronUpDownIcon
                    class="h-5 w-5 text-gray-400"
                    aria-hidden="true"
                /-->
                   </span>
            </ListboxButton>

            <transition
                leave-active-class="transition duration-100 ease-in"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <ListboxOptions
                    class="absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black/5 focus:outline-none sm:text-sm"
                >
                    <slot :selectOption="selectOption"></slot>
                </ListboxOptions>
            </transition>
        </div>
    </Listbox>
</div>
<ErrorMessage :name="name">
    {{ errorMessage }}
</ErrorMessage>
</template>


<script setup>
import {defineProps, ref, onMounted, watch} from "vue";
import {Listbox, ListboxButton, ListboxOption, ListboxOptions} from "@headlessui/vue";
import { useField } from "vee-validate";
import gsap from "gsap";

const props = defineProps({
    modelValue: {
        type: null,
    },
    name: {
        type: String,
        default: null,
    },
    label: {
        type: String,
        default: null,
    },
    rules: {
        type: null,
        default: null,
    },
    options: {
        type: Object,
        default: null,
    },
    multiple: {
        type: Boolean,
        default: false,
    },
});

const emit = defineEmits(["update:modelValue"]);

onMounted(async () => {
    if (props.modelValue !== null && (typeof props.modelValue === "string" && props.modelValue.length > 0) )
        selectOption(props.modelValue)
});

const selectedOption = ref([]);
const { value, errorMessage } = useField(props.name, props.rules,{
    initialValue: props.modelValue,
    label: props.label,
});

// to reset the field when the form has been submitted
watch(value, (newValue) => {
    if (newValue.length === 0)
        selectedOption.value = [];
});

function selectOption(val){
    if(Array.isArray(value.value)){
        selectedOption.value = [];
        for (let i = 0; i < value.value.length; i++)
            selectedOption.value[i] = props.options[value.value[i]];
    }
    else
        selectedOption.value[0] = props.options[val];

    emit("update:modelValue", value);
}

</script>
