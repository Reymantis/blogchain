<x-parts.card {{ $attributes->merge(['class' => 'relative bg-gradient-to-bl from-primary-400 to-primary-600 dark:from-gray-900 dark:to-primary-900 text-white
 ']) }}>
    <div class="max-w-2xl space-y-4">
        <h1 class="text-6xl font-bold text-shadow-sm text-shadow-black/25">{{ config('app.name') }}</h1>

    </div>
</x-parts.card>
