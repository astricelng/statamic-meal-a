{{--
    @name Default
    @desc The default template with an outer wrapper grid as defined in tailwind.config.js. It makes sure all blocks on a page get evenly spaced without having to worry about margins or paddings.
--}}

@extends('layout')

@section('body')

    <!-- /default.blade.php -->
    <main class="py-12 md:py-16 lg:py-24 stack-12 md:stack-16 lg:stack-24" id="content">
        @foreach($page_builder as $builder)
            @if (isset($builder['type']))
                @includeIf('page_builder._'.$builder['type'])
            @endif
        @endforeach
    </main>
    <!-- End: /default.blade.php -->

@endsection
