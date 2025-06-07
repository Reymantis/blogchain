<x-app-layout title="About Us">
    <div class="grid gap-4">
    <x-parts.card>
        <h1 class="text-lg  text-gray-500 flex items-center space-x-2 dark:text-gray-400 font-semibold">
            <x-heroicon-m-identification class="size-5"/>
            <span>About us</span>
        </h1>
    </x-parts.card>
    <x-parts.card>
        <section class="mx-auto prose lg:prose-lg dark:prose-invert">
            {!! Str::markdown(file_get_contents(resource_path('/markdown/about-us.blade.md'))) !!}
        </section>
    </x-parts.card>
    </div>
</x-app-layout>
