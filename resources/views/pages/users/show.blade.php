<x-app-layout :title="$user->name">
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 mb-4">
        <x-parts.card class="col-span-2  md:col-span-2  2xl:col-span-3">
            <h1 class="text-lg  text-gray-500 flex items-center space-x-2 dark:text-gray-400 font-semibold">
                <x-parts.avatar :$user size="lg"/>
                <span>{{ $user->name }}</span>
            </h1>
        </x-parts.card>
    </div>
    <livewire:user-stats :user="$user" class="mb-4"/>
</x-app-layout>
