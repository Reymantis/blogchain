<?php

namespace Database\Seeders;

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
                'name' => 'Super Admin',
                'guard_name' => 'api',
            ],
            [
                'name' => 'Admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Admin',
                'guard_name' => 'api',
            ],
            [
                'name' => 'Moderator',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Moderator',
                'guard_name' => 'api',
            ],
            [
                'name' => 'Reporter',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Reporter',
                'guard_name' => 'api',
            ],
            [
                'name' => 'Editor',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Editor',
                'guard_name' => 'api',
            ],
            [
                'name' => 'Blogger',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Blogger',
                'guard_name' => 'api',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
