{{--
@name Form
@desc The form page builder block.
@set page.page_builder.form
--}}
@php

if (isset($builder['form'])){
    $form = Statamic::tag('form:'.$builder['form']->handle())->js('vue')->fetch();
    $showModal = (isset($configuration['show_modal']) && $configuration['show_modal']) ? 'true' : 'false';
    $showNotifications = (isset($configuration['show_notifications']) && $configuration['show_notifications']) ? 'true' : 'false';
    $showErrors = (isset($configuration['show_errors_description']) && $configuration['show_errors_description']) ? 'true' : 'false';
//dd($form);
}

@endphp
<!-- /page_builder/_form.blade.php -->
<section class="fluid-container grid md:grid-cols-12 gap-8">
    <div class="md:col-start-3 md:col-span-8">
        @if (isset($builder['title']))
            <x-typography._h1 as="h2" class="mb-8" :content="$builder['title']" />
        @endif

        @if (isset($builder['text']))
            <x-typography._p :content="$builder['text']" />
        @endif

        @if (isset($form))
            <Teleport to="body">
                <x-_modal_submit :name="$builder['form']->handle()"></x-_modal_submit>
            </Teleport>

            <form-wrapper
                :builder="{{ json_encode($form) }}"
                form-name="{{ $builder['form']->handle() }}"
                :show-errors="{{ $showErrors }}"
                :show-modal="{{ $showModal  }}"
                :show-notifications="{{ $showNotifications }}"
                v-slot="slotProps">

                <!-- Error notifications. -->
                <template v-if="Object.keys(slotProps.formErrors).length > 0 && slotProps.showNotifications">
                    <div id="summary" role="group" class="rounded border p-4 bg-red-50 border-red-700">
                        <h3 class="mb-2 leading-5 font-bold text-red-700">{{ __('strings.form_error') }}</h3>
                        <ul class="list-disc list-inside marker:text-red-700" v-if="slotProps.showErrors">
                            <template v-for="(error, index) in slotProps.formErrors">
                                <li>
                                    <a :href="`#${index}`" v-html="error" class="p-1 -m-1 rounded focus:outline-none focus-visible:ring-2 ring-red-700 text-red-700 underline"></a>
                                </li>
                            </template>
                        </ul>
                    </div>
                </template>
                <!-- Success notifications. -->
                <template v-if="slotProps.success === true">
                    <x-_notification type="success" class="md:col-span-12" :content="__('strings.form_success')" />
                </template>

                <!-- Honeypot spam protection. -->
                <div class="hidden">
                    <label class="font-bold" for="{{ $form['honeypot'] }}">
                        {{ __('strings.form_honeypot') }} <sup class="text-yellow-400">*</sup>
                    </label>
                    <input class="form-input w-full" id="{{ $form['honeypot'] }}" type="text" name="{{ $form['honeypot'] }}" tabindex="-1" autocomplete="off"/>
                </div>

                @foreach($form['sections'] as $sections)
                    <fieldset class="w-full grid md:grid-cols-12 gap-6">
                        @if ($sections['display'] !== '' || $sections['instructions'] !== '')
                            <span class="md:col-span-12">
                                @if ($sections['display'] !== '')
                                    <x-typography._h2 as="legend" class="mb-2" :content="$sections['display']" />
                                @endif
                                @if ($sections['instructions'] !== '')
                                    <x-typography._p :content="$sections['instructions']" />
                                @endif
                            </span>
                        @endif

                        @foreach($sections['fields'] as $fields)
                            <div
                                class="flex flex-col space-y-3
                                        @if (@isset($fields['input_type']) && $fields['input_type'] === 'hidden') 'hidden' @endif
                                        @switch($fields['width'])
                                            @case(25)
                                                md:col-span-3
                                                @break
                                            @case(33)
                                                md:col-span-4
                                                @break
                                            @case(50)
                                                md:col-span-6
                                                @break
                                            @case(66)
                                                md:col-span-8
                                                @break
                                            @case(75)
                                                md:col-span-9
                                                @break
                                            @default
                                                md:col-span-12
                                        @endswitch"
                                v-if="{{ 'slotProps.shouldShowField('.$fields['show_field'].')' }}"
                            >
                                @if ($fields['type'] !== 'spacer')
                                    <label class="font-bold" for="{{ $fields['handle'] }}">
                                        {{ $fields['display'] }}
                                        @if (@isset($fields['validate']) && in_array('required', $fields['validate']))
                                            <sup class="text-yellow-400">*</sup>
                                        @endif
                                        @if ($fields['instructions'] !== '' && $fields['instructions_position'] === 'above')
                                            <x-typography._p class="mt-1 font-normal text-sm" :content="$fields['instructions']" />
                                        @endif
                                    </label>
                                @endif

                                <div class="mt-2 flex flex-col gap-y-2">
                                    {!! $fields['field'] !!}

                                    @if ($fields['instructions'] !== '' && $fields['instructions_position'] === 'below')
                                        <p id="{{ $fields['handle'].'-instructions' }}">
                                            <x-typography._p as="span" class="text-sm" :content="$fields['instructions']" />
                                        </p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </fieldset>
                @endforeach

                <div class="w-full grid md:grid-cols-12 gap-6">
                    {{-- Pulse button and disable upon sending. --}}
                    <div class="md:col-span-12 flex justify-end">
                        <x-_button as="button" :label="__('strings.form_send')">
                            type="submit" :disabled="slotProps.sending"
                        </x-_button>
                    </div>
                </div>
            </form-wrapper>
        @endif

    </div>
</section>
<!-- End: /page_builder/_form.blade.php -->
