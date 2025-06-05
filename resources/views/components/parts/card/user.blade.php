@props(['user'])

<x-parts.card>
    <div class="text-center space-y-2">
        <x-parts.avatar :$user size="2xl" class="mx-auto"/>
        <p class="text-lg font-bold"> {{ $user->name }}</p>
        <span class="text-sm inline-block mx-auto px-3 py-1 rounded-full bg-gray-100 dark:bg-white/5">{{ '@'. strtolower(str_replace([' ', '.'],
                        '',
                        $user->name))
                        }}</span>
        <div class="grid grid-cols-3 opacity-75 border-t border-gray-100 dark:border-white/5">
            <div class="flex flex-col justify-center py-2">
                <div class="text-sm font-light">Posts</div>
                <div class="text-xs font-bold">{{ $user->posts_count }}</div>
            </div>
            <div class="flex flex-col justify-center py-2">
                <div class="text-sm font-light">Pointes</div>
                <div class="text-xs font-bold">0</div>
            </div>
            <div class="flex flex-col justify-center py-2">
                <div class="text-sm font-light">Followers</div>
                <div class="text-xs font-bold">0</div>
            </div>
        </div>
    </div>
</x-parts.card>
