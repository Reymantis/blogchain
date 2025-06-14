<div class="inline-flex items-center">
    <button
        wire:click="likeModel"
        class="flex items-center space-x-2 transition-all duration-200  {{ $this->hoverEffects }} {{ $buttonClass }}"
        title="{{ $this->isLiked ? 'Unlike' : 'Like' }} this {{ class_basename($model) }}"
        wire:loading.attr="disabled"
        wire:target="likeModel"
    >
        <div
            class="flex items-center space-x-2"
            wire:loading.class="animate-pulse"
            wire:target="likeModel"
        >
            <x-dynamic-component
                :component="'heroicon-' . ($this->isLiked ? 's' : 'o') . '-' . str_replace(['heroicon-s-', 'heroicon-o-'], '', $this->icon)"
                :class="$size . ' ' . $this->colorClass"
            />

            @if($showCount)
                <span class="text-md font-medium transition-colors duration-200 {{ $this->isLiked ? $this->colorClass : 'text-gray-500' }}">
                    {{ $this->likeCount }}
                </span>
            @endif
        </div>
    </button>
</div>
