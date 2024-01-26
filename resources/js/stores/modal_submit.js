import {ref} from "vue";

const msubmit= {
    isOpen: ref(false),
    showError: ref(false),
    setIsOpen(value) {
        this.isOpen.value = value;
    },
    setShowError(value) {
        this.showError.value = value;
    },
    showModalFunction: null
};

export default msubmit;
