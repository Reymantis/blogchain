<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->times(5000)
            ->state(new Sequence(fn ($sequence) => ['created_at' => now()->subHour($sequence->index)]))
            ->create();
    }
}
