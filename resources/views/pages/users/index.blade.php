<x-app-layout title="Contributors" description="Meet the contributors of our project.">
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 mb-4">
        <x-parts.card class="col-span-full flex justify-between">
            <x-text.heading as="h1" icon="heroicon-o-users" class="!mb-0">
                Meet the contributors
            </x-text.heading>
            <x-button.back/>
        </x-parts.card>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 gap-4 ">
        @foreach($users as $user)
            <x-parts.card>
                <a wire:navigate.hover href="{{ route('users.show', $user) }}" class="hover:scale-105 rounded-md shadow hover:shadow-lg
                hover:shadow-primary-500/25
            transition-all">
                    <x-parts.card.user :user="$user"/>
                </a>
            </x-parts.card>
        @endforeach
        {{ $users->links() }}
    </div>
</x-app-layout>
