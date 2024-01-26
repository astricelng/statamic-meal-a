<!-- /vendor/statamic/forms/fields/integer.blade.php -->
<text-field>
    <Field
        id="{{ $handle }}"
        type="number"
        name="{{ $handle }}"
        label="{{ $display }}"
        class="w-full rounded border-neutral focus-visible:border-primary focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-primary motion-safe:transition caret-primary"
        {{ isset($placeholder) ? 'placeholder='.$placeholder : '' }}
        aria-invalid="true"
        aria-describedby="{{ $handle }}"
        :rules="{{ $rules }}"
        {{ isset($character_limit) ? 'maxlength='.$character_limit : '' }}
        {!! $js_attributes  !!}
    ></Field>
    <error-message name="{{ $handle }}" ></error-message>
</text-field>

<!-- End: /vendor/statamic/forms/fields/integer.blade.php -->
