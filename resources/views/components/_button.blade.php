{{--
    @name Button attributes
    @desc A single button component. Faux is used when a button is displayed inside a link (for example in link blocks).
    @param* label The caption label.
    @param as The wrapping element. Defaults to `a`.
    @param button_type `Inline` if the button needs to be rendered as an inline button.
    @param faux Boolean. For faux button wrapped in an actual button/anchor.
    @param inverted Boolean. When the button needs inverted styles.
--}}

<!-- /components/_button.blade.php -->
@php
    if (isset($content)){
        foreach ($content as $key => $value)
            ${$key} = $value;
    }

    if (isset($content['entry']) && $content['entry']->raw() !== null){
        $entry = $content['entry']->value()->url();
    }
@endphp

@if (isset($label))
    <{{ $as ?? 'a' }}
        {{ $slot }}
        class= "font-bold focus:outline-none focus-visible:ring focus-visible:ring-offset-2
                @if(isset($button_type) && $button_type == 'inline')
                    underline decoration-2 motion-safe:transition
                    @if(isset($inverted))
                        text-white decoration-white focus-visible:ring-white
                    @else
                        text-neutral decoration-primary focus-visible:ring-primary
                    @endif
                @else
                    inline-flex items-center py-3 px-4 rounded leading-none no-underline select-none whitespace-nowrap motion-safe:transition
                    @if (isset($inverted))
                        bg-white text-primary focus-visible:ring-white
                    @else
                        bg-primary text-white focus-visible:ring-primary
                    @endif
                @endif
                {{ $class ?? '' }}
                "
                @if (!isset($faux) || !$faux)
                    @include('snippets._button_attributes')
                @endif
    >
    {{ $label }}
    </{{ $as ?? 'a' }}>
@endif
<!-- End: /components/_button.blade.php -->
