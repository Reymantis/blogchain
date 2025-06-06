<x-filament-panels::page>
    <div class="space-y-8">
        <!-- Profile Information Section -->
        <div>
            {{ $this->editProfileForm }}
            <div class="my-6 flex justify-end">
                <x-filament::button
                    wire:click="saveProfile"
                    wire:loading.attr="disabled"
                    wire:target="saveProfile"
                    type="button"
                >
                    Update Profile

                </x-filament::button>
            </div>
        </div>

        <!-- Password Section -->
        <div>
            {{ $this->editPasswordForm }}
            <div class="my-6 flex justify-end">
                <x-filament::button
                    wire:click="savePassword"
                    wire:loading.attr="disabled"
                    wire:target="savePassword"
                    type="button"

                >

                    Update Password

                </x-filament::button>
            </div>
        </div>

        <!-- Social Media Section -->
        <div>
            {{ $this->editSocialForm }}
            <div class="my-6 flex justify-end">
                <x-filament::button
                    wire:click="saveSocial"
                    wire:loading.attr="disabled"
                    wire:target="saveSocial"
                    type="button"
                >
                    Update Social Media

                </x-filament::button>
            </div>
        </div>
    </div>
</x-filament-panels::page>
