{{--
    @name Video
    @desc The video component. A sizeable YouTube or Vimeo video rendered in a responsive container with an optional caption.
    @set page.article.video
--}}

<!-- /components/_video.blade.php -->
{{-- cookie_embeds =
    (environment == 'local' && seo:trackers_local && seo:embeds) or
    (environment == 'staging' && seo:trackers_staging && seo:embeds) or
    (environment == 'production' && seo:trackers_production && seo:embeds)
--}}
<div
    {{-- if cookie_embeds }}
    x-data
    {{ /if --}}
    class="
        not-prose my-8
        @switch($content['size'])
            @case('md')
                size-md
                @break
            @case('lg')
                size-lg
                @break
            @case('xl')
                size-xl
                @break
            @default
                size-md
        @endswitch
    "
>
    <div class="relative aspect-video">
        {{-- if cookie_embeds }}
        <div
            x-show="!$store.cookieBanner.consent || !$store.cookieBanner.embeds"
            class="absolute z-10 inset-0 p-6 flex justify-center items-center bg-neutral/10 text-neutral/80"
        >
            <a @click.prevent="$store.cookieBanner.setConsent(null)" href="#" class="p-1 -m-1 underline focus:outline-none focus-visible:ring-2 ring-primary">
                {{ trans:strings.cookie_embeds_disabled }}
            </a>
        </div>
        <template x-if="$store.cookieBanner.consent && $store.cookieBanner.embeds">
            <iframe class="absolute top-0 left-0 w-full h-full" width="100%" src="{{ video_url | embed_url }}" height="auto" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </template>
        {{ else --}}
        <iframe class="absolute top-0 left-0 w-full h-full" width="100%" src="{{ Statamic::modify($content['video_url'])->embedUrl() }}" height="auto" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        {{-- /if --}}
    </div>

    @if(isset($content['caption']))
        <x-typography._caption as="figcaption" :caption="$content['caption']" />
    @endif
</div>
<!-- End: /components/_video.blade.php -->
