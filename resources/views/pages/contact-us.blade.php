<x-app-layout title="Contact Us">
    <div class="grid gap-4">
        <x-parts.card>
            <x-text.heading as="h1" icon="heroicon-o-envelope" class="!mb-0">
                Contact Us
            </x-text.heading>
        </x-parts.card>
        <x-parts.card>
            <div class="max-w-2xl mx-auto">
                <livewire:forms.contact-us/>
            </div>
        </x-parts.card>
    </div>
</x-app-layout>
