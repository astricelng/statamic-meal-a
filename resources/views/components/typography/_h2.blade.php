{{--
    @name h2
    @desc The typography h2 partial to render an h2 with `class`, `as`, `color` and `content` attributes.
    @param* content The h2 content.
    @param as The wrapping element. Defaults to `h2`.
    @param color Set a custom text color utility. Falls back to `text-neutral`.
    @param class Add custom CSS classes.
--}}

<!-- /typography/_h2.blade.php -->
<{{ $as ?? 'h2' }} class="text-2xl font-bold leading-tight {{ $color ?? 'text-neutral' }} {{ $class ?? '' }}">{!! Statamic::modify($content)->nl2br()  !!}</{{ $as ?? 'h2' }}>
<!-- End: /typography/_h2.blade.php -->
