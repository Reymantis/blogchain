@props(['take' => 20])

<div class="sticky top-0 pb-12">


    <x-text.heading as="h4" icon="heroicon-o-tag" class="mb-3">
        Most Popular Tags
    </x-text.heading>

    <div class=" flex-wrap flex gap-2">
        @foreach($tags->take($take) as $tag)
            <a wire:navigate.hover
               href="{{ route('tags.show', $tag) }}"
               class="text-xs font-light px-2 break-keep py-0.5 rounded-md mr-1 text-gray-400 border-gray-400 hover:text-primary-500
                hover:dark:text-primary-500 dark:bg-white/5 border
                dark:border-white/5
                dark:text-white/50">
                {{ $tag->name }}
            </a>
        @endforeach
    </div>
</div>
