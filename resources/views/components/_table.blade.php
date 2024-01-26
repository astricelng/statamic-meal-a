{{--
    @name Table
    @desc The table component for sizeable content tables.
    @set page.article.table
--}}
<!-- /components/_table.blade.php -->
<div
    class="
        overflow-auto not-prose my-8
        @switch($content['size'])
            @case('md')
                size-md
                @break
            @case('lg')
                size-lg
                @break
            @case('xl')
                size-xl
                @break
            @default
                size-md
        @endswitch
    "
>
    @if (isset($content['table']) && count($content['table']) > 0)
        <table class="w-full bg-light border-collapse min-w-[580px] sm:min-w-none">
            @foreach($content['table'] as $table)
                @if ($loop->first && isset($content['first_row_headers']) && $content['first_row_headers'] === true)
                    <thead>
                        <tr>
                            @foreach($table['cells'] as $cells)
                                <th class="px-3 py-3 text-xs font-bold tracking-wider text-left text-white uppercase border-b xl:px-6 border-neutral bg-neutral">{{ $cells }}</th>
                            @endforeach
                        </tr>
                    </thead>
                @endif

                @if ($loop->first)
                    <tbody>
                @endif

                @if (!$loop->first && isset($content['first_row_headers']) && $content['first_row_headers'] === true || (!isset($content['first_row_headers']) || (isset($content['first_row_headers']) && $content['first_row_headers'] === false)) )
                    <tr>
                        @foreach($table['cells'] as $cells)
                            @if ($loop->first && isset($content['first_column_headers']) && $content['first_column_headers'] === true )
                            <th class="px-3 py-3 text-xs font-bold tracking-wider text-left text-white uppercase border-b xl:px-6 border-neutral bg-neutral">{{ $cells }}</th>
                             @else
                            <td class="px-3 py-3 text-sm border-b xl:px-6 border-neutral text-neutral">{{ $cells }}</td>
                            @endif
                        @endforeach
                    </tr>

                @endif

                @if ($loop->last)
                    </tbody>
                @endif
            @endforeach
        </table>
    @endif

    @if(isset($content['caption']))
        <x-typography._caption :caption="$content['caption']" />
    @endif
</div>
<!-- End: /components/_table.blade.php -->
