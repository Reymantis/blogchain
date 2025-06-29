@props([
    'post',
    'loop' => null
])

<x-parts.card
    no-padding
    @class([
    'bg-white dark:bg-gray-800 rounded-lg overflow-clip hover:shadow-lg h-full flex flex-col group',
    'col-span-2 row-span-2' => (boolean) $loop->first
    ])
>
    <div class="relative overflow-clip aspect-video ">
        <img
            src="{{ $post->getFirstMediaUrl('posts', 'screen') }}"
            alt="Image for {{ $post->title }} blog post"
            class="w-full aspect-video object-cover transition-transform duration-300 "
        />
        @if($loop->first)
            <div class="absolute top-4 left-4">
                <span class="bg-yellow-500 text-black px-3 py-1 rounded-full text-sm font-bold">LATEST</span>
            </div>
        @endif
    </div>
    <div class="p-6 flex-1 flex flex-col">
        <a wire:navigate.hover href="{{ route('post.show', [$post->category, $post]) }}" class="group-link">
            <h3 class="font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors text-md
            2xl:text-xl line-clamp-2">
                {{ $post->title }}
            </h3>
        </a>
        <p class="text-gray-600 dark:text-gray-300 mb-4 flex-1 2xl:text-base line-clamp-2 text-sm">
            {{ $post->description }}
        </p>
        <div class="flex items-center justify-between mb-0">
            <div class="flex items-center space-x-2">
                <img
                    src="{{ $post->user->avatar_url }}"
                    alt="{{ $post->user->name }}"
                    width="32"
                    height="32"
                    class="rounded-full"
                />
                <span class="text-gray-500 dark:text-gray-400 text-sm">
              {{ $post->user->name }}
            </span>
            </div>
            <span class="text-gray-500 dark:text-gray-400 text-sm">
            {{ $post->estimatedReadTime }} min read
          </span>
            @if(config('enable_page_views'))
                <livewire:parts.like :model="$post"/>
            @endif
        </div>
    </div>
</x-parts.card>
