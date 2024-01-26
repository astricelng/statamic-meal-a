{{--
    @name Paragraph
    @desc The typography paragraph partial to render a paragraph with `class`, `as`, `color` and `content` attributes.
    @param* content The p content.
    @param as The wrapping element. Defaults to `p`.
    @param color Set a custom text color utility. Falls back to `text-neutral`.
    @param class Add custom CSS classes.
--}}

<!-- /typography/_p.blade.php -->
<{{ $as ?? 'p' }} class="mt-0 mb-8 last:mb-0 leading-relaxed {{ $color ?? 'text-neutral' }} {{ $class ?? '' }}">{!! Statamic::modify($content)->nl2br()  !!}</{{ $as ?? 'p' }}>
<!-- End: /typography/_p.blade.php -->
