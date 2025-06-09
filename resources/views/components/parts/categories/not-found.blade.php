@props(['category'])

<x-parts.card class="col-span-full grid place-content-center min-h-[400px]">
    <div class="text-center space-y-3 ">
        <div class="size-12 mx-auto rounded-full grid place-content-center bg-gray-100 dark:bg-white/5">
            <x-heroicon-s-x-mark class="size-8 text-gray-400"/>
        </div>

        <x-text.heading as="h5">
            No article found in category <strong>"{{ $category->name }}"</strong>
        </x-text.heading>
        <p>
            Do you want to contribute to this category?
        </p>
        <div>
            <a class="px-4 py-2 inline-flex flex-nowrap flex-shrink items-center text-sm font-semibold text-shadow-sm
                        text-shadow-black/10
                        text-white
                        bg-primary-500
                hover:bg-primary-400
                rounded-md"
               href="{{ route('filament.admin.resources.posts.create') }}">
                <x-heroicon-o-plus class="inline size-5 "/>
                <span class="hidden lg:inline-block">Write Article</span>
            </a>
        </div>
    </div>
</x-parts.card>
