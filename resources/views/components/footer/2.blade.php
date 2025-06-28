@php use App\Helpers\Menu; @endphp
<footer class="mb-20 md:mb-6 ">
    <x-parts.card>
        <div class="relative grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 max-w-full lg:ml-[240px] lg:mr-[240px] marker:text-primary-500 text-sm">
            <div class="p-6">
                <p class="text-lg font-semibold mb-2">Legal Documents</p>
                <ul class="list-outside list-circle pl-2 ">
                    @foreach(Menu::legal() as $item)
                        <li class="ml-4">
                            <a href="#"
                                @class([
                                   'rounded-md px-2 py-1 inline-flex hover:underline block dark:text-gray-100/75
                                   items-center hover:text-primary-500 dark:hover:text-primary-400'
                                 ])>
                                {{ $item->name }}
                            </a>
                            @endforeach
                        </li>
                </ul>
            </div>
            <div class="p-6">
                <p class="text-lg font-semibold mb-2">Social Media</p>
                <ul class="list-outside list-circle pl-2 ">
                    @foreach(Menu::social() as $item)
                        <li class="ml-4">
                            <a href="{{ $item->url }}"
                               target="_blank"
                               rel="nofollow"
                                @class([
                                   'rounded-md px-2 py-1 inline-flex hover:underline block dark:text-gray-100/75
                                   items-center hover:text-primary-500 dark:hover:text-primary-400'
                                 ])>
                                {{--                                <x-dynamic-component :component="$item->icon" class="size-4"/>--}}
                                <span>{{ $item->name }}</span>
                            </a>
                            @endforeach
                        </li>
                </ul>
            </div>
            <div class="p-6">
                <p class="text-lg font-semibold mb-2">Legal Documents</p>
                <ul class="list-outside list-circle pl-2 ">
                    @foreach(Menu::legal() as $item)
                        <li class="ml-4">
                            <a href="#"
                                @class([
                                   'rounded-md px-2 py-1 inline-flex hover:underline block dark:text-gray-100/75
                                   items-center hover:text-primary-500 dark:hover:text-primary-400'
                                 ])>
                                {{ $item->name }}
                            </a>
                            @endforeach
                        </li>
                </ul>
            </div>
            <div class="p-6 col-span-full flex flex-col md:flex-row items-center justify-between text-gray-500">
                <div>Design &amp; Developed by <a class="text-primary-500 hover:underline" target="_blank"
                                                  href="https://designbycode.co.za">designbycode</a></div>
                <div>Copyright © {{ now()->year }} {{ config('app.name') }}.
                    All rights reserved.
                </div>


            </div>

        </div>
    </x-parts.card>
</footer>
