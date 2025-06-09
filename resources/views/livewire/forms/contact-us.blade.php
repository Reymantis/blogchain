<div>
    <form wire:submit="sendEmail" class="space-y-4">
        {{ $this->form }}
        <x-filament::button
            wire:loading.attr="disabled"
            wire:target="sendEmail"
            type="submit"
            icon="heroicon-m-paper-airplane">
            Submit
        </x-filament::button>
    </form>
</div>
