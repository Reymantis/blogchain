<x-app-layout>
    <x-parts.card>
        <section class="mx-auto prose lg:prose-lg dark:prose-invert">
            {!! Str::markdown(file_get_contents(resource_path('/markdown/about-us.blade.md'))) !!}
        </section>
    </x-parts.card>

</x-app-layout>
