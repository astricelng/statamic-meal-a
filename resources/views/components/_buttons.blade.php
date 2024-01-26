{{--
    @name Buttons
    @desc Multiple buttons component calling in `resources/vivews/components/_button.antlers.html`.
    @param inverted Boolean. When the buttons needs inverted styles.
    @set page.article.buttons
--}}

<!-- /components/_buttons.blade.php -->
@if (isset($content['buttons']))
    @if ($content['type'] == 'buttons')
        {{-- Add a size utility and use different styling when called as a Bard set. --}}
        <div class="size-md flex flex-wrap gap-3 not-prose my-8">
            @foreach($content['buttons'] as $button)
                <x-_button :content="$button->toArray()"/>
            @endforeach
        </div>
    @else
        {{-- The styling when called from any other partial or template. --}}
        <div class="flex flex-wrap gap-3 {{ $class ?? '' }}">
            @foreach($content['buttons'] as $button)
                <x-_button :inverted="$inverted" class="" :content="$button->toArray()"/>
            @endforeach
        </div>
    @endif
@endif
<!-- End: /components/_buttons.blade.php-->
