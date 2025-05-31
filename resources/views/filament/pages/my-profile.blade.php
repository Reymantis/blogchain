
<x-filament-panels::page>
    <div class="space-y-6">
        {{-- Profile Information Section --}}
        <form wire:submit="saveProfile">
            {{ $this->editProfileForm }}
            <div class="mt-6 flex justify-end">
                <x-filament::button type="submit">
                    Save Profile
                </x-filament::button>
            </div>
        </form>


        {{-- Password Update Section --}}
        <form wire:submit="savePassword">
            {{ $this->editPasswordForm }}

            <div class="mt-6 flex justify-end">
                <x-filament::button type="submit" >
                    Update Password
                </x-filament::button>
            </div>
        </form>
    </div>
</x-filament-panels::page>
