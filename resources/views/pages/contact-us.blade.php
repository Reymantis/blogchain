<x-app-layout title="Contact Us">
    <div class="grid gap-4">
        <x-parts.card>
            <h1 class="text-lg  text-gray-500 flex items-center space-x-2 dark:text-gray-400 font-semibold">
                <x-heroicon-m-envelope class="size-5"/>
                <span>Contact us</span>
            </h1>
        </x-parts.card>
        <x-parts.card>
            <div class="max-w-2xl mx-auto">
                <livewire:forms.contact-us/>
            </div>
        </x-parts.card>
    </div>
</x-app-layout>
