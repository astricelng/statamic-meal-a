{{--
@name Cards
@desc The Cards page builder block.
@set page.page_builder.cards
--}}
<!-- /page_builder/_cards.blade.php -->
<section class="fluid-container grid md:grid-cols-12 gap-8">
    @if (isset($builder['title']))
        <x-typography._h2 class="md:col-start-3 md:col-span-8 text-center" :content="$builder['title']" />
    @endif

    @if (isset($builder['cards']))
        @foreach($builder['cards'] as $card)
            @php
                if (isset($card['button'][0])){
                    foreach ($card['button'][0] as $key => $value)
                        ${$key} = ($key === 'entry' && $value->value() !== null) ? $value->value()->url() : $value;
                }
            @endphp
            <{{ isset($card['button']) ? 'a' : 'article' }}
                class="flex flex-col justify-between items-start p-6 border border-neutral/10 shadow-lg rounded no-underline focus:outline-none focus-visible:ring-2 ring-offset-2 ring-primary
                @switch(count($builder['cards']))
                    @case(0)
                        @break
                    @case(1)
                        md:col-span-8 md:col-start-3
                        @break
                    @case(2)
                        md:col-span-6
                        @break
                    @default
                        md:col-span-8 md:col-start-3 lg:col-span-4 lg:col-start-0
                @endswitch
                "
                @if (isset($card['button'][0]))
                    aria-labelledby="{{ Statamic::modify($card['title'])->slugify() }}"
                    draggable="false"
                    @include('snippets._button_attributes')
                @endif
                >
                    <div class="mb-4">
                        <span id="{{ Statamic::modify($card['title'])->slugify() }}">
                            <x-typography._h3 class="mb-2" color="text-neutral" :content="$card['title']" />
                        </span>
                        @if (isset($card['text']))
                            <x-typography._p class="mb-4" :content="$card['text']" />
                        @endif
                    </div>

                    @if (isset($card['button'][0]))
                        <x-_button as="span" :content="$card['button'][0]->toArray()" faux="true"/>
                    @endif
            </{{ isset($card['button']) ? 'a' : 'article' }}>
        @endforeach
    @endif

</section>
<!-- End: /page_builder/_cards.blade.php -->
