<x-app-layout title="Home">

    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 ">
        <x-hero class="col-span-full"/>
        @if($posts)
            @foreach($posts as $post)
                @if($loop->iteration %=10)
                    <x-parts.card.blog-2 :$loop :$post/>
                @else
                    <x-parts.card class="col-span-1 md:col-span-2 2xl:col-span-3">Ads</x-parts.card>
                @endif
            @endforeach

        @endif
        <x-parts.card class="col-span-full space-y-3">
            <x-text.heading as="h4"  class="mb-3">
                About Our Platform
            </x-text.heading>

            <p class="text-sm text-black/50 dark:text-white/75">Our platform is designed to bring together creators, developers, and innovators from around the
                world. We believe in the power of
                collaboration and the importance of sharing knowledge to drive progress.
            </p>
            <p class="text-sm text-black/50 dark:text-white/75">
                Whether you're looking to learn new skills, showcase your work, or connect with like-minded individuals, our platform provides the tools and
                community you need to succeed.
            </p>
        </x-parts.card>

    </div>


{{--    <x-slot name="rightSidebar">--}}

{{--    </x-slot>--}}

</x-app-layout>
