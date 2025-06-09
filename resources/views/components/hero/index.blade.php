<x-parts.card {{ $attributes->merge(['class' => 'relative bg-gradient-to-bl from-primary-400 to-primary-600 dark:from-gray-900 dark:to-primary-900 text-white
 ']) }}>
    <div class="max-w-2xl space-y-4">
        <h1 class="text-6xl font-bold text-shadow-sm text-shadow-black/25">{{ config('app.name') }}</h1>
        <x-text.heading as="a" icon="heroicon-o-plus" href="{{ route('filament.admin.resources.posts.create') }}">
            Write Article
        </x-text.heading>

    </div>
    <div class="absolute inset-0 z-0">
        
    </div>
</x-parts.card>
