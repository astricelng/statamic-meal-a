<!-- /vendor/statamic/forms/fields/assets.blade.php -->

@php
    $labelFileField = '<svg class="h-6 mx-auto" viewBox="0 0 32 37" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 6V30.988" stroke="#123759" stroke-width="2" stroke-linecap="round"/>
            <path d="M31 13.5V31" stroke="#123759" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M6 1H18.5" stroke="#123759" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M6 36H26" stroke="#123759" stroke-width="2" stroke-linecap="round"/>
            <path d="M31 31C31.0136 33.4971 28.5 36 26 36" stroke="#123759" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M1.00001 31C1.00001 33.5 3.5 36 6 36" stroke="#123759" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M1.00001 5.99609C1.00001 3.49973 3.5 1.05541 6 0.999731" stroke="#123759" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M30.9863 13.5112L18.5 1" stroke="#123759" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M18.5 8.5C18.5077 10.9864 21.0101 13.5 23.5 13.5" stroke="#123759" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M18.5 8.49999V1" stroke="#123759" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M23.5 13.5H31" stroke="#123759" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M6 31H13.5" stroke="#123759" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M6 26H18.5" stroke="#123759" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M6 21H13.5" stroke="#123759" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p class="md:w-7/10 block font-text py-4 mx-auto"><span class="text-blue-dark">Upload a file</span> or drag and drop (.doc .docx .jpg .pdf .png) up to 5MB</p>
            ';
    $acceptedFileTypes = [
        'image/jpeg',
        'image/png',
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    ];
    $fileTypeLabel = "{
        'image/jpeg': '.jpg',
        'image/jpeg': '.jpeg',
        'image/png': '.png',
        'application/pdf': '.pdf',
        'application/msword': '.doc',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
            '.docx',
    }";

@endphp

<file-field
    name="{{ $handle }}"
    :rules="{{ $rules }}"
    {{ isset($max_files) ? ':max-files='.$max_files : '' }}
    label="{{ $display }}"
    {!! $js_attributes  !!}
    label-idle = "{{ $labelFileField }}"
    :accepted-file-types= "{{ json_encode($acceptedFileTypes) }}"
    :file-type-label = "{{ $fileTypeLabel }}"
>
</file-field>
<!-- End: /vendor/statamic/forms/fields/assets.blade.php -->
