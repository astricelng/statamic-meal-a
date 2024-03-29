{{--
    @name h3
    @desc The typography h3 partial to render an h3 with `class`, `as`, `color` and `content` attributes.
    @param* content The h3 content.
    @param as The wrapping element. Defaults to `h3`.
    @param color Set a custom text color utility. Falls back to `text-neutral`.
    @param class Add custom CSS classes.
--}}

<!-- /typography/_h3.blade.php -->
<{{ $as ?? 'h3' }} class="text-base font-bold leading-tight {{ $color ?? 'text-neutral' }} {{ $class ?? '' }}">{!! Statamic::modify($content)->nl2br()  !!}</{{ $as ?? 'h3' }}>
<!-- End: /typography/_h3.blade.php -->
