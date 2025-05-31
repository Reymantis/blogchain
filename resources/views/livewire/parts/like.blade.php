<button class=" flex items-center space-x-2" @click="$wire.likeModel({{ $model->id }})">
    @if(auth()->check() && $model->likedBy(auth()->user()))
        <x-heroicon-s-heart class="size-6 text-red-500"/>
    @else
        <x-heroicon-o-heart class="size-6 text-red-500"/>
    @endif
    <span class="text-sm">{{ $model->getLikeCount() }}</span>
</button>
