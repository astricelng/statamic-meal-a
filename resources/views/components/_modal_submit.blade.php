<modal-submit name="{{ $name }}" ref="{{ 'modal-submit_'.$name }}" v-slot="slotPropsModal" style="opacity: 0; visibility: hidden">
      {{--<template v-slot:modal-content>--}}

        <div
            class="overlay fixed inset-0 bg-black bg-opacity-75 transition-opacity"
            aria-hidden="true"
        ></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span
            class="hidden sm:inline-block sm:align-middle sm:h-screen"
            aria-hidden="true"
        >&#8203;</span
        >

        <div
            class="modal inline-block align-bottom bg-black border-3 border-white py-10 xl:py-12 px-10 overflow-hidden transform transition-all sm:align-middle max-w-xs md:max-w-xl w-full shadow-modal-mob xl:shadow-modal"
            :class="[
					slotPropsModal.errorStatus
						? 'shadow-red xl:shadow-red'
						: 'shadow-green xl:shadow-green',
				]"
        >
            <div class="w-full">
                <div class="mx-auto flex items-center justify-center">
                    <!-- Heroicon name: outline/check -->
                    <svg
                        class="h-7 md:h-15"
                        v-if="!slotPropsModal.errorStatus"
                        viewBox="0 0 76 60"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M11.3853 27.8361L10.3318 26.7891L9.27448 27.8323L3.94645 33.0896L2.86817 34.1536L3.94269 35.2213L24.9171 56.064L25.9744 57.1147L27.0317 56.064L72.0573 11.3213L73.128 10.2573L72.0573 9.19327L66.7668 3.936L65.71 2.88583L64.6527 3.9355L25.9749 42.334L11.3853 27.8361Z"
                            fill="black"
                            stroke="#00A343"
                            stroke-width="3"
                        />
                    </svg>

                    <svg
                        v-else
                        class="h-8 md:h-15"
                        viewBox="0 0 10 34"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <rect
                            x="2"
                            y="2"
                            width="6.36364"
                            height="19.0909"
                            fill="black"
                            stroke="#F33E0B"
                            stroke-width="3"
                        />
                        <rect
                            x="2"
                            y="25.6364"
                            width="6.36364"
                            height="6.36364"
                            fill="black"
                            stroke="#F33E0B"
                            stroke-width="3"
                        />
                    </svg>
                </div>
                <div class="mt-5 md:mt-7">
                    <h1
                        tabindex="0"
                        class="text-center"
                        :class="[
								!slotPropsModal.errorStatus
									? 'font-subtitle text-xl xl:text-4xl leading-normal xl:leading-custom'
									: 'text-xl xl:text-[2.5rem] leading-normal xl:leading-tight',
							]"
                        id="modal-title"
                        v-html="{{ '[ !slotPropsModal.errorStatus ?  "'.__('strings.form_success').'" : "'.__('strings.form_error').'" ]' }}"
                    ></h1>
                    <div v-if="Object.keys(slotPropsModal.errors).length > 0">
                        <div v-for="(value, key) in slotPropsModal.errors" :key="key">
                            <p v-html="value"></p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-5 md:mt-7">
                    <button
                        type="button"
                        @click="{{ 'slotPropsModal.response()' }}"
                        class="btn_modal-close font-title font-bold text-xl xl:text-2xl leading-none text-yellow hover:underline uppercase focus:outline-none transition duration-150 ease-in-out"
                    >
                        Accept
                    </button>
                </div>
            </div>
        </div>

</modal-submit>
