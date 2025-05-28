<x-app-layout>
    <section class="mx-auto prose lg:prose-md dark:prose-invert">

        @if($post->hasMedia('posts'))
        <img class="rounded-lg shadow-md shadow-black/15" src="{{ $post->getFirstMediaUrl('posts', 'main') }}" alt="{{ $post->title }}">
        @endif
            <h1 class="text-3xl font-bold">
                {{ $post->title }}
            </h1>
        <div >
            {!! str($post->content)->sanitizeHtml() !!}
        </div>
    </section>

</x-app-layout>
