<div>
    <p class="text-lg text-gray-500 flex items-center space-x-2 dark:text-gray-400 font-semibold mb-3">
        <x-heroicon-m-folder class="size-5"/>
        <span>Categories Tree</span>
    </p>
    <ul class="marker:text-primary-500 text-sm">
        @foreach($categories->toTree() as $category)
            <li>
                <a href="{{ route('categories.show', $category->slug) }}"
                    @class([
                        'rounded-md px-2 py-1 hover:bg-gray-50 hover:dark:bg-white/5 block dark:text-gray-100/75 items-center hover:text-primary-500
                        dark:hover:text-primary-400 flex justify-between items-center',
                        '!text-primary-500 text-primary-400 bg-gray-50 dark:bg-white/5' =>
                          request()->routeIs('categories.show') && request()->route('category')->is($category),
                      ])>
                    <span>{{ $category->name }}</span>
                    <small class="text-xs  text-black/25 dark:text-white/25">({{ $category->children_count }})</small>
                </a>
                @if($category->children)
                    <ul class="list-outside list-circle pl-2">
                        @foreach($category->children as $child)
                            <li class="ml-4">
                                <a href="{{ route('posts.index', $child->slug) }}"
                                    @class([
                                       'rounded-md px-2 py-1 hover:bg-gray-50 hover:dark:bg-white/5 block dark:text-gray-100/75 items-center
                                       hover:text-primary-500 dark:hover:text-primary-400',
                                       'text-primary-500 !text-primary-400 bg-gray-50 dark:bg-white/5' =>
                                           request()->routeIs('posts.index') && request()->route('category')->is($child),
                                           'line-through opacity-25 cursor-not-allowed ' => $child->posts_count
                                           === 0,
                                     ])>
                                    {{ $child->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>
