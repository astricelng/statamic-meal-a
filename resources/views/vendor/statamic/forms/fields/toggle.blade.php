@php
    if ( $handle == 'consent'){
        $configuration = \Statamic\Facades\GlobalSet::find('configuration')->fileData();

        if (isset($configuration['data']['privacy_statement_type'])){
            $privacy = '';

            if ($configuration['data']['privacy_statement_type'] === 'entry'){
                $entry = \Statamic\Facades\Entry::find($configuration['data']['privacy_statement_entry']);
                if (isset($entry['url']))
                    $link = $entry['url'];
            }
            else if ($configuration['data']['privacy_statement_type'] === 'pdf'){
                $file = $configuration['data']['privacy_statement_asset'];
                $link = getPathAsset($file);
               // $privacy = '<a class="px-1 -m-1 underline rounded hover:text-primary focus:outline-none focus-visible:ring-2 focus-visible:ring-primary" href="'.$configuration['data']['privacy_statement_asset'].'" target="_blank">'.__('strings.cookie_learn_more').'</a>';
            }
        }
    }
@endphp

<toggle-field
    name="{{ $handle }}"
    mlabel="{{ $display }}"
    :rules="{{ $rules }}"
    label="{{ $inline_label ?? null }}"
    link = "{{ $handle == 'consent' ? $link : null  }}"
    link-title = "{{ $handle == 'consent' ? __('strings.cookie_learn_more') : null  }}"
    {!! $js_attributes  !!}
    v-slot="slotToggleProps"
>
    <button
        class="relative inline-flex h-6 w-11 items-center rounded-full"
        :class="slotToggleProps.checked ? 'bg-gray-400' : 'bg-gray-200'"
    >
        <span class="sr-only" v-if="slotToggleProps.label" v-html="slotToggleProps.label"></span>
        <span
            :class="slotToggleProps.checked ? 'translate-x-6' : 'translate-x-1'"
            class="inline-block h-4 w-4 rounded-full bg-white transform transition duration-300 ease-in-out "
        />
    </button>

</toggle-field>
