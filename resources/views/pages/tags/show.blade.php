<x-app-layout title="Tags">
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 ">
        <x-parts.card class="col-span-2  md:col-span-2  2xl:col-span-3">
            <x-text.heading as="h1" icon="heroicon-o-tag">
                Tag: {{ $tag->name }}
            </x-text.heading>
        </x-parts.card>
        @if($posts->count())
            @foreach($posts as $post)
                <x-parts.card.blog-2 :$post :$loop/>
            @endforeach
        @endif
        {{ $posts->links() }}
    </div>
</x-app-layout>
