{{--
    @name Caption
    @desc The typography caption partial to render a caption with `as` and `caption` attributes.
    @param content The caption content.
    @param as The wrapping element. Defaults to `span`.
    @param color Set a custom text color utility. Falls back to `text-neutral`.
    @param class Add custom CSS classes.
--}}

<!-- /typography/_caption.blade.php -->
@if (trim($caption) !== '' )
    <{{ $as ?? 'span' }} class="block mt-2 text-sm {{ $color ?? 'text-neutral' }} {{ $class ?? '' }}">
    {{ $caption }}
    </{{ $as ?? 'span' }}>
@endif
<!-- End: /typography/_caption.blade.php -->
