<div>
    <p class="text-lg text-gray-500 dark:text-gray-400 font-semibold mb-3">
        Categories Tree

    </p>
    <ul class="marker:text-primary-500 text-sm">
        @foreach($categories->toTree() as $category)
            <li>
                <a href="{{ route('categories.show', $category->slug) }}"
                    @class([
                        'rounded-md px-2 py-1 hover:bg-gray-50 hover:dark:bg-white/5 block dark:text-gray-100/75 items-center hover:text-primary-500 dark:hover:text-primary-400',
                        'text-primary-500 !text-primary-400 bg-gray-50 dark:bg-white/5' =>
                            request()->routeIs('categories.show') && request()->route('category') === $category->slug,
                      ])>
                    {{ $category->name }}
                </a>
                @if($category->children)
                    <ul class="list-outside list-circle  pl-2 ">
                        @foreach($category->children as $child)
                            <li class="ml-4 ">
                                <a href="{{ route('categories.show', $child->slug) }}"
                                    @class([
                                      'rounded-md px-2 py-1 hover:bg-gray-50 hover:dark:bg-white/5 block dark:text-gray-100/75 items-center hover:text-primary-500 dark:hover:text-primary-400',
                                      'text-primary-500 !text-primary-400 bg-gray-50 dark:bg-white/5' =>
                                          request()->routeIs('categories.show') && request()->route('category') === $child->slug,
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
