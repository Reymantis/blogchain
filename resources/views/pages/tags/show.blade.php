<x-app-layout title="Tags" description="Explore posts by tags.">
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 ">
        <x-parts.card class="col-span-full flex justify-between">
            <x-text.heading as="h1" icon="heroicon-o-tag" class="!mb-0">
                Tag: {{ $tag->name }}
            </x-text.heading>
            <x-button.back/>
        </x-parts.card>
        @if($posts->count())
            @foreach($posts as $post)
                <x-parts.card.blog-2 :$post :$loop/>
            @endforeach
        @endif
        {{ $posts->links() }}
    </div>
</x-app-layout>
