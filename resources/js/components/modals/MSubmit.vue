<template>
    <div
        class="fixed z-10 inset-0 overflow-y-auto"
        :class="'modal-submit_' + name"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true"
        aria-hidden="false"
        style="opacity: 0; visibility: hidden"
    >
        <div
            class="flex items-center lg:items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
        >
            <slot :response="response" :errorStatus="errorStatus" :errors="errors"></slot>
            <!--slot name="modal-content" :response="response"/-->
        </div>
    </div>
</template>


<script setup>
import gsap from "gsap";
import {ref, onMounted, watch} from "vue";
import msubmit from "../../stores/modal_submit.js";

const props = defineProps({
    name: {
        type: String,
        default: 'form',
    },
});

var modal = ".modal-submit_" + props.name;
var errorStatus = ref(false);
var errors = ref([]);
var tl = null;

onMounted(() => {
    tl = gsap.timeline();
});

function manageModal(isError, errorsArray) {
    errorStatus.value = isError !== undefined ? isError : false;
    errors = (errorsArray !== undefined && msubmit.showError.value) ? errorsArray : [];

    if (msubmit.isOpen.value) {
        tl.to(modal, { autoAlpha: 1 })
            .to(modal + " .overlay", { duration: 0.3, opacity: 0.75 })
            .to(modal + " .modal", {
                duration: 0.3,
                opacity: 1,
                delay: -0.3,
            });

        document.querySelector("body").classList.add("modalOpen");

        document.querySelector(modal).setAttribute("aria-hidden", "false");

        document
            .querySelector("body.modalOpen")
            .addEventListener("focusin", focusInModal);
    } else {
        tl.to(modal, { autoAlpha: 0 })
            .to(modal + " .overlay", { duration: 0.3, opacity: 0 })
            .to(modal + " .modal", { duration: 0.3, opacity: 0 });

        document
            .querySelector("body.modalOpen")
            .removeEventListener("focusin", focusInModal);

        document.querySelector("body").classList.remove("modalOpen");

        document.querySelector(modal).setAttribute("aria-hidden", "true");
    }
}

function response(url = null) {
    msubmit.setIsOpen(false);
    manageModal();

    if (url !== null){
        location.href = url;
    }
}

function focusInModal() {
    document.querySelector(modal + " .btn_modal-close").focus();
}

msubmit.showModalFunction = manageModal;
</script>
