<!-- /vendor/statamic/forms/fields/select.blade.php -->
<select-field
    name="{{ $handle }}"
    label="{{ $display }}"
    :rules="{{ $rules }}"
    :options="{{ json_encode($options) }}"
    :multiple="{{ isset($multiple) && $multiple === true ? 'true' : 'false' }}"
    {!! $js_attributes  !!}
    v-slot="slotPropsSelect"
>
    @foreach($options as $value => $label)
        <h-listbox-option
            v-slot="{ active, selected }"
            key="{{ $label }}"
            value="{{ $value }}"
            as="template"
            @click="{{ 'slotPropsSelect.selectOption("'.$value.'")' }}"
        >
            <li
                :class="[
                          active ? 'bg-amber-100 text-amber-900' : 'text-gray-900',
                          'relative cursor-default select-none py-2 pl-10 pr-4',
                        ]"
            >
                <span
                    :class="[
                    selected ? 'font-medium' : 'font-normal',
                    'block truncate',
                  ]">
                    {{ $label }}
                </span>
                <span
                    v-if="selected"
                    class="absolute inset-y-0 left-0 flex items-center pl-3 text-amber-600"
                >
                    <!--CheckIcon class="h-5 w-5" aria-hidden="true" /-->
                </span>
            </li>
        </h-listbox-option>
    @endforeach
</select-field>

<!-- End: /vendor/statamic/forms/fields/select.blade.php -->
