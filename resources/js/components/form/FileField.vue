<template>
    <div>
        <FilePond
            :name="name"
            :id="name"
            :label="label"
            ref="pond"
            credits="false"
            :label-idle="labelIdle"
            :max-files="maxFiles"
            :allow-multiple="maxFiles !== 1"
            instant-upload="false"
            :acceptedFileTypes="acceptedFileTypes"
            :fileValidateTypeLabelExpectedTypesMap="fileTypeLabel"
            v-on:updatefiles="handleFilePondUpdateFile"
        />
        <ErrorMessage :name="name">
            {{ errorMessage }}
        </ErrorMessage>
    </div>
</template>


<script>
import { watch, ref } from "vue";
import vueFilePond from "vue-filepond";
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import { useField } from "vee-validate";
import "filepond/dist/filepond.min.css";

const FilePond = vueFilePond(FilePondPluginFileValidateType);

export default {
    components: {
        vueFilePond,
        FilePondPluginFileValidateType,
        FilePond,
    },
    props: {
        modelValue: {
            type: null,
        },
        name: {
            type: String,
            required: true,
        },
        rules: {
            type: null,
            default: null,
        },
        maxFiles: {
            type: Number,
            default: null
        },
        label: {
            type: String,
            default: null
        },
        labelIdle: {
            type: String,
            default: null
        },
        acceptedFileTypes: {
            type: Array,
            default: [],
        },
        fileTypeLabel: {
            type: Object,
            default: {},
        }
    },
    emits: ["update:modelValue"],
    setup(props, { emit }) {
        const myFile = ref(null);
        const pond = ref(null);

        const { value, errorMessage } = useField(props.name, props.rules, {
            initialValue: props.modelValue,
            label: props.label,
        });
        // Sync v-model binding with vee-validate model changes
        watch(myFile, (newValue) => {
            if (newValue !== props.modelValue) {
                emit("update:modelValue", newValue);
            }
        });

        // Sync vee-validate's model with external model changes.
        watch(
            () => props.modelValue,
            (newModel) => {
                if (newModel !== value.value) {
                    value.value = newModel;
                }
            }
        );

        // to reset file when the form has been submitted
        watch(value, (newValue) => {
            if ( newValue !== null && newValue.length === 0)
                pond.value.removeFiles();
        });

        function handleFilePondUpdateFile(files) {
            myFile.value = files.map((files) => files.file);

        }

        return {
            myFile,
            value,
            errorMessage,
            handleFilePondUpdateFile,
            pond,
        };
    },
};

</script>
