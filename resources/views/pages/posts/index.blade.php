<x-app-layout :title="$category->name">

    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 ">
        <x-parts.card class="col-span-full">
            <x-text.heading as="h1" icon="heroicon-o-folder">
                {{ $category->name }}
            </x-text.heading>
            <span class="flex space-x-2 items-center px-1.5 text-black/25 dark:text-white/25">
                <x-heroicon-m-arrow-turn-left-up class="size-3"/>
                <small class="text-xs ">Listed in
                    <a wire:navigate
                       class="text-primary-500 hover:underline"
                       href="{{ route('categories.show',  $category->ancestors[0])}}">
                    {{  $category->ancestors[0]->name }}</a>
                </small>
            </span>
        </x-parts.card>
        @if($posts->count())
            @foreach($posts as $post)
                <x-parts.card.blog-2 :$post :$loop/>
            @endforeach
        @else
            <x-parts.categories.not-found :category="$category"/>
        @endif
        {{ $posts->links() }}
    </div>


</x-app-layout>
