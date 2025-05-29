<button class=" flex items-center space-x-2" @click="$wire.likeModel({{ $model->id }})">
    @if(auth()->check() && $model->liked(auth()->user()->id))
        <x-heroicon-s-heart class="size-6 text-red-500"/>
    @else
        <x-heroicon-o-heart class="size-6 text-red-500"/>
    @endif
    <span class="text-sm">{{ $model->likeCount }}</span>
</button>
