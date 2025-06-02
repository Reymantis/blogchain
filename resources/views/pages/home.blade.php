<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 ">
        <x-parts.card class="bg-gradient-to-bl from-primary-400 to-primary-600 dark:from-gray-900 dark:to-primary-900 text-white col-span-2
        md:col-span-2  2xl:col-span-3">
            <div class="max-w-2xl space-y-4">
                <h1 class="text-6xl font-bold text-shadow-sm text-shadow-black/25">{{ config('app.name') }}</h1>
                <p class="text-xl text-white/75 text-shadow-sm text-shadow-black/10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, doloremque
                    ducimus eaque hic inventore ipsum
                    obcaecati. Accusamus,
                    animi aut
                    delectus harum incidunt ipsa iure quibusdam, quo reiciendis sequi veritatis, voluptatem.</p>

                <button class="px-6 py-2 rounded-lg border border-white hover:bg-white/25">Read more</button>
            </div>

        </x-parts.card>
        @if($posts)
            @foreach($posts as $post)
                @if($loop->iteration %=10)
                    <x-parts.card.blog-2 :$loop :$post/>
                @else
                    <x-parts.card class="col-span-1 md:col-span-2 2xl:col-span-3">Ads</x-parts.card>
                @endif
            @endforeach
            <x-parts.card class="col-span-1 md:col-span-2 2xl:col-span-3 flex justify-between">
                {{ $posts->links() }}
            </x-parts.card>
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

    </div>

    {{--    <x-slot name="leftSidebar">--}}
    {{--       --}}
    {{--    </x-slot>--}}

    <x-slot name="rightSidebar">
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
