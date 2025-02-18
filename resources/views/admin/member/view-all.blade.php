<x-app-layout>
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-full lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-[3px] bg-clip-border">
                <div class="overflow-x-auto p-2">
                    <table class="w-full border-[1px] border-primaryLight/50 border-collapse">
                        <thead>
                            <tr class="bg-primaryDark/30">
                                @foreach ($columns as $column)
                                <th class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">
                                    {{ $column['label'] }}
                                </th>
                                @endforeach
                                <th class="border-[1px] border-primaryLight/50 font-semibold text-black px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $index => $row)
                            <tr>
                                @foreach ($columns as $column)
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm">
                                    @php
                                    $expression = str_replace(
                                    ['index', 'row'],
                                    [$index, '$row'],
                                    $column['expression']
                                    );
                                    @endphp
                                    {!! eval("return $expression;") !!}
                                </td>
                                @endforeach
                                <td class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-1 text-sm">
                                    <div class="flex h-full">
                                        @foreach ($routes as $route)
                                        <a href="{{route($route['route'],$route['params'])}}" class="{{$route['class']}}" title="{{$route['label']}}"><i class="{{$route['icon']}} text-xs"></i></a>
                                        @endforeach
                                    </div>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="{{ count($columns) + 1 }}"
                                    class="border-[1px] border-primaryLight/50 font-medium text-black px-4 py-0.5 text-sm text-center">
                                    No records found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>