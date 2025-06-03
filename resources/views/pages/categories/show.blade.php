<x-app-layout :title="$category->name">
    {{--    {{ dd(json_encode($category, JSON_PRETTY_PRINT)) }}--}}
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 auto-rows-fr">
        <x-parts.card class="col-span-2  md:col-span-2  2xl:col-span-3">
            <h1>
                <div class="text-lg text-gray-500 flex items-center space-x-2 dark:text-gray-400 font-semibold">
                    <x-heroicon-m-folder class="size-5"/>
                    <span>{{ $category->name }}</span>
                </div>
                @if($category->children_count)
                    <div class="flex space-x-2 items-center px-1.5 text-black/25 dark:text-white/25">
                        <x-heroicon-m-arrow-turn-down-right class="size-3"/>
                        <small class="text-xs ">With {{ $category->children_count }} sub {{ Str::plural('category', $category->children_count) }}  </small>
                    </div>
                @else
                    <div class="flex space-x-2 items-center px-1.5 text-black/25 dark:text-white/25">
                        <x-heroicon-m-arrow-turn-left-up class="size-3"/>
                        <small class="text-xs ">Listed in {{ $category->ancestors[0]->name }} </small>
                    </div>
                @endif
            </h1>
        </x-parts.card>

        @foreach($category->children as $children)
            <x-parts.card class="col-span-1">
                {{ $children->name }}
            </x-parts.card>
        @endforeach
    </div>


</x-app-layout>
