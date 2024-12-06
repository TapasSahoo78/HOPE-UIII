<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $useRole = Role::where('slug', 'admin')->first();
        $user = User::where('email', 'admin@gmail.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "Admin";
            $user->email = "admin@gmail.com";
            $user->password = Hash::make('12345678');
            $user->is_admin = true;
            $user->is_verified = 1;
            $user->save();
            $user->roles()->attach($useRole);
        }

        $user = User::where('email', 'superadmin@gmail.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "Super Admin";
            $user->email = "superadmin@gmail.com";
            $user->password = Hash::make('12345678');
            $user->is_admin = true;
            $user->is_verified = 1;
            $user->save();
            $user->roles()->attach($useRole);
        }
    }
}
