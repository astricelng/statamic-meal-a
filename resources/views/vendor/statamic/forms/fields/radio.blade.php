<!-- /vendor/statamic/forms/fields/radio.blade.php -->
<fieldset
    class="flex
        {{ isset($inline) && $inline
            ? 'gap-x-4'
            : 'flex-col gap-y-2'
        }}"
    id="{{ $handle }}"
    aria-invalid="true"
    aria-describedBy="{{ $handle }}"
>
    @if (isset($options))
        @foreach($options as $value => $label)
            <text-field>
                <label class="inline-flex items-center">
                    <Field
                        type="radio"
                        name="{{ $handle }}"
                        label="{{ $display }}"
                        :rules="{{ $rules }}"
                        class="mr-2 border-neutral text-primary focus-visible:border-primary focus-visible:ring-inset focus-visible:ring-primary motion-safe:transition"
                        value="{{ $value }}"
                        {!! $js_attributes  !!}
                    /></Field>
                    {{ $label  }}
                </label>
            </text-field>
        @endforeach

        <error-message name="{{ $handle }}" ></error-message>
    @endif
</fieldset>
<!-- End: /vendor/statamic/forms/fields/radio.blade.php -->
