<x-app-layout title="Home">

    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 ">
        <x-hero class="col-span-2 md:col-span-2  2xl:col-span-3"/>
        @if($posts)
            @foreach($posts as $post)
                @if($loop->iteration %=10)
                    <x-parts.card.blog-2 :$loop :$post/>
                @else
                    <x-parts.card class="col-span-1 md:col-span-2 2xl:col-span-3">Ads</x-parts.card>
                @endif
            @endforeach
            {{--            <x-parts.card class="col-span-1 md:col-span-2 2xl:col-span-3 flex justify-between">--}}
            {{--                {{ $posts->links() }}--}}
            {{--            </x-parts.card>--}}
        @endif
        <x-parts.card class="col-span-1 md:col-span-2 2xl:col-span-3 space-y-3">
            <h1 class="text-3xl dark:text-shadow-sm dark:text-shadow-black-500/25">About Our Platform</h1>
            <p class="text-md text-black/50 dark:text-white/75">Our platform is designed to bring together creators, developers, and innovators from around the
                world. We believe in the power of
                collaboration and the importance of sharing knowledge to drive progress.
            </p>

            <p class="text-md text-black/50 dark:text-white/75">
                Whether you're looking to learn new skills, showcase your work, or connect with like-minded individuals, our platform provides the tools and
                community you need to succeed.
            </p>
        </x-parts.card>

        <x-parts.card class="col-span-1 md:col-span-2 2xl:col-span-3 space-y-3">
            <p class="text-lg text-gray-500 flex items-center space-x-2 dark:text-gray-400 font-semibold mb-3">
            <div class="size-3 mr-1 bg-lime-500 inline-block rounded-full animate-pulse"></div>
            Active Users online: <span class="text-lime-500 font-semibold">{{ $usersActive->count() }}</span>
            </p>

            @if($usersActive->count())
                @foreach($usersActive as $user)
                    <a href="#" class="flex items-center text-sm space-x-1">
                        <img class="size-6 rounded-full inline-block" src="{{ $user->avatar ?? 'https://ui-avatars.com/api/?name='.$user->name
                        .'&color=7F9CF5&background=EBF4FF'  }}"
                             alt="{{ $user->name }}">
                        <span>{{ $user->name }}</span>
                    </a>
                @endforeach
            @endif
        </x-parts.card>

    </div>


    <x-slot name="rightSidebar">
        <p class="text-lg text-gray-500 flex items-center space-x-2 dark:text-gray-400 font-semibold mb-3">
            <x-heroicon-m-tag class="size-5"/>
            <span>Most Popular Tags</span>
        </p>
        <div class=" flex-wrap flex gap-2">
            @foreach($tags as $tag)
                <a class="text-xs font-light px-2 break-keep py-0.5 rounded-md mr-1 text-gray-400 border-gray-400 hover:text-primary-500
                hover:dark:text-primary-500 dark:bg-white/5 border
                dark:border-white/5
                dark:text-white/50" href="#">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>

    </x-slot>

</x-app-layout>
