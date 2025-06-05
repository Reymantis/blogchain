<x-app-layout :title="$category->name">

    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 ">
        <x-parts.card class="col-span-2  md:col-span-2  2xl:col-span-3">
            <h1>
                <span class="text-lg text-gray-500 flex items-center space-x-2 dark:text-gray-400 font-semibold">
                    <x-heroicon-m-folder class="size-5"/>
                    <span>{{ $category->name }}</span>
                </span>
                <span class="flex space-x-2 items-center px-1.5 text-black/25 dark:text-white/25">
                    <x-heroicon-m-arrow-turn-left-up class="size-3"/>
                    <small class="text-xs ">Listed in
                        <a wire:navigate
                           class="text-primary-500 hover:underline"
                           href="{{ route('categories.show',  $category->ancestors[0])}}">
                        {{  $category->ancestors[0]->name }}</a>
                    </small>
                </span>
            </h1>
        </x-parts.card>
        @if($posts->count())
            @foreach($posts as $post)
                <x-parts.card.blog-2 :$post :$loop/>
            @endforeach
        @else
            <x-parts.card class="col-span-2 grid place-content-center md:col-span-2 2xl:col-span-3 min-h-[400px]">
                <div class="text-center space-y-2 ">
                    <div class="size-12 mx-auto rounded-full grid place-content-center bg-gray-100 dark:bg-white/5">
                        <x-heroicon-s-x-mark class="size-8 text-gray-400"/>
                    </div>
                    <h3 class="text-xl font-semibold">No article found in category <strong>{{ $category->name }}</strong></h3>
                    <p>
                        Do you want to contribute to this category?
                    </p>
                    <div class="space-x-2">
                        <a class="hover:underline" href="{{ route('filament.admin.auth.login') }}">Sign-In</a>
                        <span>or</span>
                        <a class="hover:underline" href="{{ route('filament.admin.auth.register') }}">Sign-Up</a>
                    </div>
                </div>
            </x-parts.card>
        @endif

        <x-parts.card class="col-span-2 md:col-span-2 2xl:col-span-3">
            {{ $posts->links() }}
        </x-parts.card>
    </div>


</x-app-layout>
