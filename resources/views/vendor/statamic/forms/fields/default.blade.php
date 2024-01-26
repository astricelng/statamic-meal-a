<!-- /vendor/statamic/forms/fields/default.blade.php -->

<text-field>
    <Field
        id="{{ $handle }}"
        type="{{ $input_type ?? 'text' }}"
        name="{{ $handle }}"
        label="{{ $display }}"
        class="w-full rounded border-neutral focus-visible:border-primary focus-visible:ring focus-visible:ring-primary motion-safe:transition caret-primary"
        {{ isset($placeholder) ? 'placeholder='.$placeholder : '' }}
        aria-invalid="true"
        aria-describedby="{{ $handle }}"
        :rules="{{ $rules }}"
        {{ isset($character_limit) ? 'maxlength='.$character_limit : '' }}
        {!! $js_attributes  !!}
    ></Field>
    <error-message name="{{ $handle }}" ></error-message>
</text-field>

<!-- End: /vendor/statamic/forms/fields/default.blade.php -->
