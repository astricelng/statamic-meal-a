{{--
    @name Image
    @desc The image component. A sizeable image rendered in a figure tag with optional caption.
    @set page.article.image
--}}

<!-- /components/_image.blade.php -->
<figure
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
    @php
        switch($content['size']){
            case 'md':
                $size = '(min-width: 1280px) 640px, (min-width: 768px) 50vw, 90vw';
                break;
            case 'lg':
                $size = '(min-width: 1280px) 960px, (min-width: 768px) 75vw, 90vw';
                break;
            case 'xl':
                $size = '(min-width: 1280px) 1150px, 90vw';
                break;
            default:
                $size = '100vw';
                break;
        }
    @endphp

    @include('vendor.statamic-peak-tools.components._picture',
        [
            'image' => $content['image'],
            'class' => "w-full",
            'cover' => false,
            'lazy' => true,
            'sizes' => $size,
        ]
    )

    @if(isset($content['caption']))
        <x-typography._caption as="figcaption" :caption="$content['caption']" />
    @endif
</figure>
<!-- End: /components/_image.blade.php -->
