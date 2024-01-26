{{--
    @name Picture
    @desc The picture component. A responsive imageset in a picture element. See `resources/views/components/_figure.antlers.html` for an example on how to use this.
    @param* image An image URL.
    @param* sizes The sizes attribute. Something like `(min-width: 768px) 55vw, 90vw` for example.
    @param aspect_ratio Pass in an aspect ratio to crop the image in a certain way. `16/9` for example or specify a second ratio for larger screens: `1/1 large:1/2`.
    @param skip_ratio_steps Integer. Skip 1, 2 or 3 ratio steps to force small screens rendering big images to use mobile cropping instead of `large` cropping.
    @param srcset_from The path to a partial with an alternative srcset definition array. Something like `snippets/srcset_full_width` for example.
    @param class Add optional CSS classes.
    @param cover Boolean. Whether the image should cover the parent. Uses the focus position.
    @param bg String. Sets a background color for transparent images.
    @param blur Integer. Adds a blur effect to the image. Use values between 0 and 100.
    @param brightness String. Adjusts the image brightness. Use values between -100 and +100, where 0 represents no change.
    @param contrast String. Adjusts the image contrast. Use values between -100 and +100, where 0 represents no change.
    @param filter String. Applies a filter effect to the image. Accepts `greyscale` or `sepia`.
    @param gamma Float. Adjusts the image gamma. Use values between 0.1 and 9.99.
    @param sharpen Integer. Sharpen the image. Use values between 0 and 100.
    @param pixelate Integer. Applies a pixelation effect to the image. Use values between 0 and 1000.
    @param lazy Boolean. Whether the image should be natively lazy loaded.
    @param quality int Set image quality. Defaults to 85.
--}}

<!-- statamic-peak-tools::components/_picture.blade.php -->
@if (isset($image))

{{-- Configure aspect ratio's. --}}
@php
    $meta = $image->meta();
    $extension = $image->extension();
    $ratio = null;
    $ratio_large = null;

    if (isset($aspect_ratio))
    {
        $aspect_ratio = trim($aspect_ratio);
        $ratio_values = explode(" ", $aspect_ratio);

        for ($i = 0, $m = count($ratio_values); $i < $m; $i++){

            if(str_contains($ratio_values[$i], "large:")){
                $temp = explode(":", $ratio_values[$i]);

                if (count($temp) > 1){
                    $aspect = $temp[1];
                    $aspect_values = explode("/", $aspect);
                    $ratio_large = $aspect_values[count($aspect_values) - 1] / $aspect_values[0];
                }

            }
            else{
                $aspect_values = explode("/", $ratio_values[$i]);
                $ratio = $aspect_values[count($aspect_values) - 1] / $aspect_values[0];
            }
        }
    }

    if (isset($meta['width']) && isset($meta['height'])){
        $original_ratio = $meta['height'] / $meta['width'];
    }

    // Initialize srcset variable in current scope to be overwritable from partial below.
    $srcset = null;

    $srcset = [
        [ 'width' => 320, 'ratio' => $ratio ?? $original_ratio ],
        [ 'width' => 480, 'ratio' => $ratio ?? $original_ratio ],
        [ 'width' => 640, 'ratio' => $ratio ?? $original_ratio ],
        [ 'width' => 768, 'ratio' => $ratio ?? $original_ratio ],
        [ 'width' => 1024, 'ratio' =>  ( (!isset($skip_ratio_steps) || ( isset($skip_ratio_steps) && $skip_ratio_steps != 1 && $skip_ratio_steps != 2 && $skip_ratio_steps != 3)) ? $ratio_large : $ratio) ?? $ratio ?? $original_ratio  ],
        [ 'width' => 1280, 'ratio' =>  ( (!isset($skip_ratio_steps) || ( isset($skip_ratio_steps) && $skip_ratio_steps != 2 && $skip_ratio_steps != 3)) ? $ratio_large : $ratio) ?? $ratio ?? $original_ratio  ],
        [ 'width' => 1440, 'ratio' =>  ( (!isset($skip_ratio_steps) || ( isset($skip_ratio_steps) && $skip_ratio_steps != 3)) ? $ratio_large : $ratio) ?? $ratio ?? $original_ratio ],
        [ 'width' => 1536, 'ratio' => $ratio_large ?? $ratio ?? $original_ratio ],
        [ 'width' => 1680, 'ratio' => $ratio_large ?? $ratio ?? $original_ratio ]
    ];
@endphp

<picture>
    @if ($extension == 'svg' || $extension == 'gif')
        <img
            @if (isset($cover) && $cover)
                class="object-cover w-full h-full {{ $class ?? '' }}"
                style="object-position:  {{ Statamic::modify( (!isset($meta['data']['focus'])) ? '50-50-1' : $meta['data']['focus'])->backgroundPosition() }}"
            @else
                class="{{ $class ?? '' }}"
            @endif
            src="{{ $image->url() }}"
            alt="{{ isset($meta['data']['alt']) ? Statamic::modify($meta['data']['alt'])->ensureRight('.')->entities() : '' }}"
            width="{{ $meta['width'] }}"
            height="{{ $meta['height'] }}"
            @unless (isset($meta['data']['alt']))
                aria-hidden="true"
            @endunless
        />
    @else

        @include('vendor.statamic-peak-tools.snippets._srcset_images')

    @endif
</picture>

@endif
<!-- End: statamic-peak-tools::components/_picture.blade.php -->
