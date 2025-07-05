<x-app-layout title="Home">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 ">

        {{--        <x-hero class="col-span-full"/>--}}

        @if($posts)
            @foreach($posts as $post)
                {{--                @if($loop->iteration == 2)--}}
                {{--                    <x-widget.clock/>--}}
                {{--                    <x-widget.weather/>--}}
                {{--                @endif--}}

                @if($loop->iteration %=10)
                    <x-parts.card.blog-2 :$loop :$post/>
                @else
                    <x-parts.card class="col-span-full md:col-span-2 2xl:col-span-3">Ads</x-parts.card>
                @endif
            @endforeach
        @endif
    </div>
    <x-slot name="rightSidebar">
        <div class="space-y-5">
            <x-widget.weather/>
            <x-sidebar.tags/>
        </div>

    </x-slot>
</x-app-layout>
