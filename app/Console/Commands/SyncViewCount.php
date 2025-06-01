<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class SyncViewCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blogchain:sync-view-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync view count from Redis to Database';

    protected $models = [
        Post::class,
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        collect($this->models)->each(function ($model) {
            $views = $model::select('id')->pluck('id')->map(function ($id) use ($model) {
                return ['id' => $id, 'view_count' => Redis::pfcount(sprintf('%s.%s.views', (new $model)->getTable(), $id))];
            })
                ->toArray();

            batch()->update(new $model(), $views, 'id');
        });
    }
}
