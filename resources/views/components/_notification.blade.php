{{--
    @name Notification
    @desc The notification component. Currently used in `resources/views/page_builder/_form.antlers.html`.
    @param* content The notification content.
    @param* type The type of notification: `success`, `notice`, or `error`.
    @param class Add custom CSS classes.
--}}

<!-- /components/_notification.blade.php -->
<div
    class="
        rounded border p-4
        @switch($type)
            @case('success')
                bg-green-100 border-green-600
                @break
            @case('notice')
                bg-yellow-100 border-yellow-600
                @break
            @case('error')
                bg-red-100 border-red-600
                @break
            @default
                bg-gray-100 border-gray-600
        @endswitch
        {{ $class }}
    "
>
    <div class="flex">
        <div class="ml-3">
            <h3
                class="
                    text-sm leading-5 font-bold
                    @switch($type)
                        @case('success')
                            text-green-800
                            @break
                        @case('notice')
                            text-yellow-800
                            @break
                        @case('error')
                            text-red-800
                            @break
                        @default
                            text-gray-800
                    @endswitch
                "
            >
                {{ $content }}
            </h3>
        </div>
    </div>
</div>
<!-- End: /components/_notification.blade.php -->
