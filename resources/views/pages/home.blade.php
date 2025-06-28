<x-app-layout title="Home">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 ">
        {{--        <x-hero class="col-span-full"/>--}}

        @if($posts)
            @foreach($posts as $post)
                @if($loop->iteration == 2)
                    <x-widget.clock/>
                    <x-widget.weather/>
                    <x-widget.weather-2/>
                @endif

                @if($loop->iteration %=10)
                    <x-parts.card.blog-2 :$loop :$post/>
                @else
                    <x-parts.card class="col-span-full md:col-span-2 2xl:col-span-3">Ads</x-parts.card>
                @endif
            @endforeach
        @endif
    </div>
    {{--    <x-slot name="rightSidebar">--}}
    {{--    </x-slot>--}}
</x-app-layout>
