<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
                'slug' => 'admin',
                'is_admin' => 0
            ],
            [
                'name' => 'user',
                'slug' => 'user',
                'is_admin' => 1
            ]
        ];

        // Insert the roles into the roles table
        foreach ($roles as $roleData) {
            Role::create($roleData);
        }
    }
}
