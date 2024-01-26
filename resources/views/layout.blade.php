<!doctype html>
<html lang="{{ $site->short_locale }}" class="antialiased scroll-smooth scroll-pt-4">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/site.css')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! Statamic::tag('partial:statamic-peak-seo::snippets/seo')!!}
    {!! Statamic::tag('partial:statamic-peak-browser-appearance::snippets/browser_appearance') !!}
    {!! Statamic::tag('partial:statamic-peak-tools::snippets/live_preview') !!}
</head>
<body class="flex flex-col min-h-screen bg-white selection:bg-primary selection:text-white">
    {!! Statamic::tag('partial:layout/seobody') !!}

    {!! Statamic::tag('partial:statamic-peak-tools::snippets/noscript') !!}
    {!! Statamic::tag('partial:statamic-peak-tools::navigation/skip_to_content') !!}
    {!! Statamic::tag('partial:statamic-peak-tools::components/toolbar') !!}

    <div id="app">
        @yield('body')
    </div>

    <!-- Include Statamic's front-end `helpers.js` file -->
    <script src="/vendor/statamic/frontend/js/helpers.js"></script>
    @vite('resources/js/app.js')
</body>
</html>
