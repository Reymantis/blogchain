<x-app-layout title="Tags">
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 ">
        <x-parts.card class="col-span-2  md:col-span-2  2xl:col-span-3">

            <h1 class="text-lg  text-gray-500 flex items-center space-x-2 dark:text-gray-400 font-semibold">
                <x-heroicon-m-envelope class="size-5"/>
                <span>Tag: {{ $tag->name }}</span>
            </h1>
        </x-parts.card>

        @if($posts->count())
            @foreach($posts as $post)
                <x-parts.card.blog-2 :$post :$loop/>
            @endforeach

        @endif

        {{ $posts->links() }}



    </div>
</x-app-layout>
