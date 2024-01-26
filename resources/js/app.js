import "./bootstrap";

import { createApp } from "vue/dist/vue.esm-bundler";

const app = createApp({
    data() {
        return {
        }
    },
    mounted() {

    }
});

app.config.globalProperties.Statamic = window.Statamic;

import { Field, ErrorMessage } from "vee-validate";
import TextField from "./components/form/TextField.vue";
import ToggleField from "./components/form/ToggleField.vue";
import FileField from "./components/form/FileField.vue";
import SelectField from "./components/form/SelectField.vue";

import { ListboxOption } from '@headlessui/vue';
import FormWrapper from "./components/FormWrapper.vue";
import ModalSubmit from "./components/modals/MSubmit.vue";

app.component("Field", Field);
app.component("ErrorMessage", ErrorMessage);
app.component("TextField", TextField);
app.component("ToggleField", ToggleField);
app.component("FileField", FileField);
app.component("SelectField", SelectField);
app.component("HListboxOption", ListboxOption);
app.component("ModalSubmit", ModalSubmit);
app.component("form-wrapper", FormWrapper);

app.mount("#app");
