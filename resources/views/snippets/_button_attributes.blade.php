{{--
    @name Button attributes
    @desc Button attributes snippet used in `resources/views/components/_button.antlers.html`.
--}}
@switch($link_type ?? '')
    @case('entry')
        {{ isset($entry) ? 'href='.$entry : '' }}
        @break
    @case('url')
        {{ isset($url) ? 'href='.$url : '' }}
        @break
    @case('email')
        {{ isset($email) ? 'href=mailto:'.$email : '' }}
        @break
    @case('tel')
        {{ isset($tel) ? 'href=tel:'.$tel : '' }}
        @break
    @case('asset')
        {{ isset($asset) ?? 'href="'.$asset.'".download' }}
        @break
    @case('button')
        @break
    @default
        {{ isset($url) ? 'href='.$url : '' }}
@endswitch

@if (isset($target_blank) && trim($target_blank) !== '')
    rel="noopener" target="_blank"
@endif

@if (isset($attr_title) && trim($attr_title) !== '')
    title="{{ $attr_title }}"
@endif

@if (isset($attr_aria) && trim($attr_aria) !== '')
    aria-label="{{ $attr_aria }}"
@endif
