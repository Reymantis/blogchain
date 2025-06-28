<x-app-layout :title="$title">
    <div class="grid gap-4">
        <x-parts.card class="flex justify-between">
            <x-text.heading as="h1" icon="heroicon-o-information-circle" class="!mb-0">
                {{  $title }}
            </x-text.heading>
            <x-button.back/>
        </x-parts.card>
        <x-parts.card>
            <section class="mx-auto prose lg:prose-lg dark:prose-invert">
                {!! Str::markdown(file_get_contents(resource_path("/markdown/" . $file .".blade.md"))) !!}
            </section>
        </x-parts.card>
    </div>
</x-app-layout>
