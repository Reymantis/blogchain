<x-app-layout :title="$user->name" :description="$user->bio">
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 mb-4">
        <x-parts.card class="col-span-full flex justify-between">
            <h1 class="text-lg  text-gray-500 flex items-center space-x-2 dark:text-gray-400 font-semibold">
                <x-parts.avatar :$user size="lg"/>
                <span>{{ $user->name }}</span>
            </h1>
            <x-button.back/>
        </x-parts.card>
        {{--        <livewire:blog-posts-chart class="mb-4 "/>--}}
        {{--        <livewire:blog-posts-chart class="mb-4 "/>--}}
        {{--        <livewire:blog-posts-chart class="mb-4 "/>--}}
    </div>
    <livewire:user-stats :user="$user" class="mb-4"/>

</x-app-layout>
