<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Super Admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Moderator',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Super Admin',
                'guard_name' => 'api',
            ],
            [
                'name' => 'Admin',
                'guard_name' => 'api',
            ],
            [
                'name' => 'Moderator',
                'guard_name' => 'api',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
