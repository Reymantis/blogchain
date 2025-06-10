<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
            RolesSeeder::class,
            CategorySeeder::class,
//            UserSeeder::class,
//            PostSeeder::class,
//            TagSeeder::class,
        ]);

        $user = User::factory()->create([
            'name' => 'Claude Myburgh',
            'email' => 'claude@blogchain.news',
        ]);

        $user->assignRole('Super Admin');


        $user = User::factory()->create([
            'name' => 'Renier Grobler',
            'email' => 'renier@blogchain.news',
        ]);

        $user->assignRole('Super Admin');
    }
}
