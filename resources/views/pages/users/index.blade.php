<x-app-layout title="Contributors">
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 mb-4">
        <x-parts.card class="col-span-2  md:col-span-2  2xl:col-span-3">
            <x-text.heading as="h1" icon="heroicon-o-users" >
                Meet the contributors
            </x-text.heading>
        </x-parts.card>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 gap-4 ">
        @foreach($users as $user)
            <a wire:navigate href="{{ route('users.show', $user) }}" class="hover:scale-105 transition-all">
                <x-parts.card.user :user="$user"/>
            </a>
        @endforeach
        {{ $users->links() }}
    </div>
</x-app-layout>
