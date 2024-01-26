<template>
    <Form
        :ref="el => { formRef = el}"
        method="POST"
        :id="'form-' + formName"
        @submit="submit"
        @invalid-submit="onInvalidSubmit"

    >

        <slot
            :formData="formData"
            :shouldShowField="shouldShowField"
            :sending="sending"
            :formErrors="formErrors"
            :showNotifications="showNotifications"
            :success="success"
            :showErrors="showErrors">
        </slot>

        <!--template v-for="sections in builder.sections">
            <fieldset class="w-full grid md:grid-cols-12 gap-6">
                <template v-if="sections.display !== '' || sections.instructions !== ''">
                    <span class="md:col-span-12">
                        <h2Partial class-inline="mb-2" as="legend" :content="sections.display" v-if="sections.display !== ''"></h2Partial>
                        <pPartial :content="sections.instructions" v-if="sections.instructions !== ''"></pPartial>
                    </span>
                </template>

                <template v-for="fields in sections.fields" >
                        <div
                            class="flex flex-col space-y-3"
                            :class = "[ fields.input_type === 'hidden' ? 'hidden' : '', setWidth(fields.width), Statamic.$conditions.showField(JSON.parse(fields.show_field), formData.value) ? 'SI' : 'NO']"
                            >

                            <label class="font-bold" :for="fields.handle" v-if="fields.type !== 'spacer'">
                                {{ fields.display }}
                                <sup class="text-yellow-400" v-if="fields.validate && fields.validate.indexOf('required') > -1">*</sup>
                                <pPartial class-inline="my-1 text-sm" :content="fields.instructions" v-if="fields.instructions"></pPartial>
                            </label>

                            <div class="flex flex-col space-y-2">
                                <div v-html="fields.field"></div>

                                 Display error label when there is a validation error with the name field. -->
                                <!--template v-if="errors && errors[fields.handle]">
                                    <span class="text-red-800 text-sm font-bold" :id="fields.handle" v-html="errors[fields.handle]"></span>
                                </template>
                            </div>
                        </div>
                </template>
                <button type="button" @click="shouldShowField()">AQUI</button>
            </fieldset>
        </template-->
    </Form>
</template>


<script setup>
import { ref, onBeforeUpdate } from "vue";
import { Form, defineRule } from "vee-validate";
import  * as AllRules from "@vee-validate/rules";
import msubmit from "../stores/modal_submit.js";

Object.keys(AllRules).forEach(rule => {
    defineRule(rule, AllRules[rule]);
});

const props = defineProps({
    builder: {
        type: Object,
        default: null,
    },
    formName: {
        type: String,
        default: 'form'
    },
    showErrors: {
        type: Boolean,
        default: false
    },
    showModal: {
        type: Boolean,
        default: false
    },
    showNotifications: {
        type: Boolean,
        default: false
    },
});

const formData = ref((props.builder.attrs.data) !== undefined ? JSON.parse(props.builder.attrs.data) : {});

const formRef = ref(null);
const formErrors = ref([]);
const sending = ref(false);
const success = ref(false);

onBeforeUpdate(() => {
    formRef.value = ref();
})

function shouldShowField(conditionsObject){
    return Statamic.$conditions.showField(conditionsObject, formData.value);
}

function submit(values, actions){
    sending.value = true;
    success.value = false;
    formErrors.value = [];

    let postData = new FormData();

    for (const [key, value] of Object.entries(formData.value)) {

        if (typeof value === "object"){
            for (let i = 0; i < value.length; i++)
                postData.append(key+'['+i+']', value[i]);
        }
        else {
            postData.append(key, value);
        }
    }

    // Post the form.
    axios
        .post(props.builder.attrs.action, postData, {
            headers: {
                "Content-Type": props.builder.attrs.enctype,
            },
        })
        .then(response => {
            if (response.status === 200 && response.data) {
                formErrors.value = [];
                sending.value = false;
                success.value = true;

                manageMessages();
                formRef.value.resetForm();

            }
            else {
                sending.value = false;
                manageMessages();
            }
        })
        .catch(err => {
            sending.value = false;

            if (err.response.data.errors) {
                formErrors.value = err.response.data.error;
                actions.setErrors(err.response.data.error);

                manageMessages();
            }
        })
}

function onInvalidSubmit({ values, errors, results }){
    sending.value = false;
    formErrors.value = errors;

    if (Object.keys(formErrors).length > 0){
        manageMessages();
    }
}

function manageMessages() {

    if (props.showModal) {
        msubmit.setIsOpen(true);
        msubmit.setShowError(props.showErrors);
        msubmit.showModalFunction(Object.keys(formErrors.value).length > 0, formErrors);
    }

    if (props.showNotifications)
        document.querySelector('#form-' + props.formName).scrollIntoView({behavior: "smooth"});
}


</script>
