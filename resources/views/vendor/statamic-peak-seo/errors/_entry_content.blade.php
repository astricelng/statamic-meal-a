{{--
    @name Error: Entry content
    @desc Renders the content of the error entry.
--}}

@foreach($page_builder as $builder)
    @if (isset($builder['type']))
        @includeIf('page_builder._'.$builder['type'])
    @endif
@endforeach
