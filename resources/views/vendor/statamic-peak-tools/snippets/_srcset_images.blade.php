{{--
    @name Images (except svg and gif) `scrset` definition
    @desc The definition of the source of the picture which gets loaded in `statamic-peak-tools::components/_picture.antlers.html`.
--}}

<source
    srcset="
            @foreach($srcset as $set)
                {{Statamic::tag('glide:generate')
                    ->src($image->url())
                    ->width($set['width'])
                    ->height($set['width'] * $set['ratio'])
                    ->bg($set['bg'] ?? null)
                    ->blur($set['blur'] ?? null)
                    ->brightness($set['brightness'] ?? null)
                    ->contrast($set['contrast'] ?? null)
                    ->filter($set['filter'] ?? null)
                    ->gamma($set['gamma'] ?? null)
                    ->pixelate($set['pixelate'] ?? null)
                    ->sharpen($set['sharpen'] ?? null)
                    ->fit('crop_focal')
                    ->format('webp')
                    ->quality($set['quality'] ?? '85')[0]['url'] }}
                     {{ $set['width'].'w'.($loop->last ? '' : ',') }}
            @endforeach
        "
    sizes="{{ $sizes ?? '(min-width: 1280px) 640px, (min-width: 768px) 50vw, 90vw' }}"
    type="image/webp"
>

<source
    srcset="
            @foreach($srcset as $set)
               {{ Statamic::tag('glide:generate')
                    ->src($image->url())
                    ->width($set['width'])
                    ->height($set['width'] * $set['ratio'])
                    ->bg($set['bg'] ?? null)
                    ->blur($set['blur'] ?? null)
                    ->brightness($set['brightness'] ?? null)
                    ->contrast($set['contrast'] ?? null)
                    ->filter($set['filter'] ?? null)
                    ->gamma($set['gamma'] ?? null)
                    ->pixelate($set['pixelate'] ?? null)
                    ->sharpen($set['sharpen'] ?? null)
                    ->fit('crop_focal')
                    ->quality($set['quality'] ?? '85')[0]['url'] }}
                    {{ $set['width'].'w'.($loop->last ? '' : ',') }}
            @endforeach
        "
    sizes="{{ $sizes ?? '(min-width: 1280px) 640px, (min-width: 768px) 50vw, 90vw' }}"
    type="{{ $meta['mime_type'] }}"
>

<img
    width="{{ $meta['width'] }}"
    height="{{ $meta['height'] }}"
    src="{{ Statamic::tag('glide:generate')
                ->src($image->url())
                ->width('1024')
                ->height(1024 * $original_ratio)
                ->fit('crop_focal')
                ->bg($set['bg'] ?? null)
                ->blur($set['blur'] ?? null)
                ->brightness($set['brightness'] ?? null)
                ->contrast($set['contrast'] ?? null)
                ->filter($set['filter'] ?? null)
                ->gamma($set['gamma'] ?? null)
                ->pixelate($set['pixelate'] ?? null)
                ->sharpen($set['sharpen'] ?? null)
                ->quality($set['quality'] ?? '85')[0]['url'] }}"

    alt="{{ isset($meta['data']['alt']) ? Statamic::modify($meta['data']['alt'])->ensureRight('.')->entities() : '' }}"

    @if (isset($cover) && $cover)
        class="object-cover w-full h-full {{ $class ?? '' }}"
    style="object-position: {{ Statamic::modify( (!isset($meta['data']['focus'])) ? '50-50-1' : $meta['data']['focus'])->backgroundPosition() }}"
    @else
        class="{{ $class ?? '' }}"
    @endif

    @unless (isset($meta['data']['alt']))
        aria-hidden="true"
    @endunless

    @if (isset($lazy) && $lazy)
        loading="lazy"
    @endif
>
