<x-app-layout :title="$category->name">
    {{--    {{ dd(json_encode($category, JSON_PRETTY_PRINT)) }}--}}
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 ">
        <x-parts.card class="col-span-2  md:col-span-2  2xl:col-span-3">
            <h1>
                <span class="text-lg text-gray-500 flex items-center space-x-2 dark:text-gray-400 font-semibold">
                    <x-heroicon-m-folder class="size-5"/>
                    <span>{{ $category->name }}</span>
                </span>
                <span class="flex space-x-2 items-center px-1.5 text-black/25 dark:text-white/25">
                    <x-heroicon-m-arrow-turn-left-up class="size-3"/>
                    <small class="text-xs ">Listed in
                        <a wire:navigate
                           class="text-primary-500 hover:underline"
                           href="{{ route('categories.show',  $category->ancestors[0])}}">
                        {{  $category->ancestors[0]->name }}</a>
                    </small>
                </span>
            </h1>
        </x-parts.card>
        @if($posts)
            @foreach($posts as $post)
                <x-parts.card.blog-2 :$post :$loop/>
            @endforeach
        @endif

        <x-parts.card class="col-span-2 md:col-span-2 2xl:col-span-3">
            {{ $posts->links() }}
        </x-parts.card>


    </div>


</x-app-layout>
