<x-app-layout>
    <x-parts.card>
    <section class="mx-auto prose lg:prose-lg dark:prose-invert">
        <h1 >
            {{ $post->title }}
        </h1>
        @if($post->hasMedia('posts'))
        <img class="rounded-lg shadow-md shadow-black/15" src="{{ $post->getFirstMediaUrl('posts', 'main') }}" alt="{{ $post->title }}">
        @endif

        <div >
            {!! str($post->content)->sanitizeHtml() !!}
        </div>
    </section>
    </x-parts.card>
</x-app-layout>
