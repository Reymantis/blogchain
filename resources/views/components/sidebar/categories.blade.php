<div class="sticky top-0 pb-12">

    <x-text.heading as="h4" icon="heroicon-o-folder-open">
        Categories Tree
    </x-text.heading>
    <ul class="marker:text-primary-500 text-sm">
        @foreach($categories->sortBy('name')->toTree() as $category)
            <li>
                <a href="{{ route('categories.show', $category->slug) }}"
                    @class([
                        'rounded-md px-2 py-1 hover:bg-gray-50 hover:dark:bg-white/5 block dark:text-gray-100/75 items-center hover:text-primary-500
                        dark:hover:text-primary-400 flex justify-between items-center',
                        '!text-primary-500 text-primary-400 bg-gray-50 dark:bg-white/5' =>
                          request()->routeIs('categories.show') && request()->route('category')->is($category),
                      ])>
                    <span>{{ $category->name }}</span>
                </a>
                @if($category->children)
                    <ul class="list-outside list-circle pl-2">
                        @foreach($category->children as $child)
                            <li class="ml-4">
                                <a wire:navigate href="{{ route('posts.index', $child->slug) }}"
                                    @class([
                                       'rounded-md px-2 py-1 flex justify-between hover:bg-gray-50 hover:dark:bg-white/5 block dark:text-gray-100/75
                                       items-center
                                       hover:text-primary-500 dark:hover:text-primary-400',
                                       'text-primary-500 text-primary-400 bg-gray-50 dark:bg-white/5' =>
                                           request()->routeIs('posts.index') && request()->route('category')->is($child),
                                           'line-through opacity-25 ' => !$child->posts_count,
                                     ])>
                                    <span>
                                    {{ $child->name }}
                                    </span>
                                    {{--                                    <x-parts.tooltip text="Articles Count" arrow position="left">--}}
                                    {{--                                        <small class="text-xs  text-black/25 dark:text-white/25">({{ $child->posts_count }})</small>--}}
                                    {{--                                    </x-parts.tooltip>--}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>
