<div>
    <div class="inline-flex items-center"
         x-data


    <button
        :id="buttonId"
        wire:click="likeModel"
        class="flex items-center space-x-2 transition-all cursor-pointer duration-200 {{ $this->hoverEffects }} {{ $buttonClass }}"
        title="{{ $this->isLiked ? 'Unlike' : 'Like' }} this {{ class_basename($model) }}"
        wire:loading.attr="disabled"
        wire:target="likeModel"
        x-ref="likeButton"
    >
        <div
            class="flex items-center space-x-2 relative"
            wire:loading.class="animate-pulse"
            wire:target="likeModel"
        >
            <!-- Animated wrapper for scale effect -->
            <div class="transform transition-transform duration-200"
                 :class="{ 'animate-bounce': isAnimating }"
                 x-ref="iconWrapper">
                <x-dynamic-component

                    :component="'heroicon-' . ($this->isLiked ? 's' : 'o') . '-' . str_replace(['heroicon-s-', 'heroicon-o-'], '', $this->icon)"
                    :class="$size . ' ' . $this->colorClass"
                />
            </div>

            @if($showCount)
                <span class="text-md font-medium transition-colors duration-200 {{ $this->isLiked ? $this->colorClass : 'text-gray-500' }}">
                    {{ $this->likeCount }}
                </span>
            @endif
        </div>
    </button>

</div>


<style>
    @keyframes bounce {
        0%, 20%, 53%, 80%, 100% {
            transform: translate3d(0, 0, 0);
        }
        40%, 43% {
            transform: translate3d(0, -8px, 0);
        }
        70% {
            transform: translate3d(0, -4px, 0);
        }
        90% {
            transform: translate3d(0, -2px, 0);
        }
    }

    .animate-bounce {
        animation: bounce 0.6s ease-in-out;
    }
</style>
</div>
