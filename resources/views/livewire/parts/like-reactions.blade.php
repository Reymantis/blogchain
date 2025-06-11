<div>
    <div x-data="reactionComponent()" class="reactions-wrapper">
        {{-- Filament Actions Modal --}}
        <x-filament-actions::modals/>

        {{-- Main Reactions Container --}}
        <div class="reactions-container bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-4 shadow-sm">

            {{-- Reaction Buttons Grid --}}
            <div class="reactions-grid grid grid-cols-3 gap-3">
                @foreach($availableTypes as $type)
                    <button
                        x-data="{
                        isActive: @js($this->isReactionActive($type)),
                        count: @js($this->reactionCounts[$type] ?? 0),
                        isAnimating: false
                    }"
                        @click="toggleReaction('{{ $type }}', $el)"
                        class="reaction-item group relative flex flex-col items-center justify-center p-3 rounded-lg border-2 transition-all duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                        :class="{
                        'border-blue-500 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400': isActive,
                        'border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:border-gray-300 dark:hover:border-gray-500': !isActive
                    }"
                    >
                        {{-- Reaction Emoji with Animation --}}
                        <div class="reaction-emoji text-2xl mb-2 transition-transform duration-200"
                             :class="{ 'animate-bounce': isAnimating }">
                            {{ $this->getReactionEmoji($type) }}
                        </div>

                        {{-- Reaction Label --}}
                        <div class="reaction-label text-xs font-medium mb-1">
                            {{ $this->getReactionLabel($type) }}
                        </div>

                        {{-- Reaction Count --}}
                        <div class="reaction-count text-xs font-bold"
                             :class="{ 'text-blue-600 dark:text-blue-400': isActive, 'text-gray-500 dark:text-gray-400': !isActive }"
                             x-text="count > 0 ? count : ''">
                        </div>

                        {{-- Active State Indicator --}}
                        <div x-show="isActive"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute -top-1 -right-1 w-3 h-3 bg-blue-500 rounded-full border-2 border-white dark:border-gray-800">
                        </div>
                    </button>
                @endforeach
            </div>

            {{-- Summary Bar (only show if there are reactions) --}}
            @if($this->totalReactions > 0)
                <div class="reactions-summary mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex items-center justify-between">
                        {{-- Top Reactions --}}
                        <div class="flex items-center space-x-2">
                            @foreach($this->topReactions as $type => $count)
                                @if($count > 0)
                                    <div class="flex items-center space-x-1 bg-gray-100 dark:bg-gray-700 rounded-full px-2 py-1">
                                        <span class="text-sm">{{ $this->getReactionEmoji($type) }}</span>
                                        <span class="text-xs font-medium text-gray-700 dark:text-gray-300">{{ $count }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        {{-- Total Count --}}
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            <span class="font-medium">{{ $this->totalReactions }}</span>
                            {{ Str::plural('reaction', $this->totalReactions) }}
                        </div>
                    </div>
                </div>
            @endif

            {{-- Empty State --}}
            @if($this->totalReactions === 0)
                <div class="empty-state text-center py-2">
                    <p class="text-sm text-gray-400 dark:text-gray-500">Be the first to react!</p>
                </div>
            @endif
        </div>
    </div>

    <script>
        function reactionComponent() {
            return {
                init() {
                    // Initialize any needed setup
                },

                async toggleReaction(type, element) {
                    // Prevent double clicks
                    if (element.disabled) return;
                    element.disabled = true;

                    // Get Alpine data from the button
                    const alpineData = Alpine.$data(element);

                    // Optimistic UI update
                    const wasActive = alpineData.isActive;
                    alpineData.isActive = !wasActive;
                    alpineData.count = wasActive ? Math.max(0, alpineData.count - 1) : alpineData.count + 1;
                    alpineData.isAnimating = true;

                    // Stop animation after a short delay
                    setTimeout(() => {
                        alpineData.isAnimating = false;
                    }, 600);

                    try {
                        // Call Livewire method
                        await $wire.toggleReaction(type);

                        // Sync with server state (in case of conflicts)
                        const serverData = await $wire.$refresh();

                    } catch (error) {
                        // Revert optimistic update on error
                        alpineData.isActive = wasActive;
                        alpineData.count = wasActive ? alpineData.count + 1 : Math.max(0, alpineData.count - 1);
                        alpineData.isAnimating = false;

                        console.error('Reaction toggle failed:', error);
                    } finally {
                        element.disabled = false;
                    }
                }
            }
        }
    </script>

    <style>
        .reactions-wrapper {
            @apply w-full max-w-md mx-auto;
        }

        .reactions-container {
            @apply transition-all duration-200;
        }

        .reactions-container:hover {
            @apply shadow-md;
        }

        .reaction-item {
            @apply min-h-[80px] cursor-pointer select-none;
        }

        .reaction-item:hover .reaction-emoji {
            @apply scale-110;
        }

        .reaction-item:active {
            @apply scale-95;
        }

        /* Dark mode specific styles */
        @media (prefers-color-scheme: dark) {
            .reaction-item:hover:not(.border-blue-500) {
                @apply bg-gray-600;
            }
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .reactions-grid {
                @apply grid-cols-2 gap-2;
            }

            .reaction-item {
                @apply min-h-[70px] p-2;
            }

            .reaction-emoji {
                @apply text-xl mb-1;
            }

            .reaction-label {
                @apply text-xs;
            }
        }

        /* Animation keyframes */
        @keyframes reaction-pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        .reaction-pulse {
            animation: reaction-pulse 0.3s ease-in-out;
        }
    </style>
</div>
