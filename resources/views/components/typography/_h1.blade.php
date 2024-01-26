{{--
    @name h1
    @desc The typography h1 partial to render an h1 with `class`, `as`, `color` and `content` attributes.
    @param* content The h1 content.
    @param as The wrapping element. Defaults to `h1`.
    @param color Set a custom text color utility. Falls back to `text-neutral`.
    @param class Add custom CSS classes.
--}}

<!-- /typography/_h1.blade.php -->
<{{ $as ?? 'h1' }} class="text-2xl md:text-4xl font-bold leading-tight {{ $color ?? 'text-neutral' }} {{ $class ?? '' }}">{!! Statamic::modify($content)->nl2br()  !!}</{{ $as ?? 'h1' }}>
<!-- End: /typography/_h1.blade.php -->
