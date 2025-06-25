<x-app-layout :title="$category->name">
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 ">
        <x-parts.card class="col-span-full flex justify-between">
            <div>
                <x-text.heading as="h1" icon="heroicon-o-identification" class="!mb-0">
                    {{ $category->name }}
                </x-text.heading>
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
            </div>
            <x-button.back/>
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
