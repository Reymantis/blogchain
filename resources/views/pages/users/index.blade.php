<x-app-layout title="Contributes">
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 mb-4">
        <x-parts.card class="col-span-2  md:col-span-2  2xl:col-span-3">
            <h1 class="text-lg  text-gray-500 flex items-center space-x-2 dark:text-gray-400 font-semibold">
                <x-heroicon-m-users class="size-5"/>
                <span>Meet the contributes</span>
            </h1>
        </x-parts.card>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 gap-4 ">
        @foreach($users as $user)
            <a wire:navigate href="{{ route('users.show', $user) }}" class="hover:scale-105 transition-all">
                <x-parts.card.user :user="$user"/>
            </a>
        @endforeach
        <x-parts.card class="col-span-1 md:col-span-2 2xl:col-span-4">
            {{ $users->links() }}
        </x-parts.card>
    </div>
</x-app-layout>
