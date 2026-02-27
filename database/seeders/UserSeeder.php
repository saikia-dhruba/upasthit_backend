<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->truncate();
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $adminRole->givePermissionTo(Permission::all());

        $user = User::firstOrCreate(
            ['email' => 'admin@upasthiti.org'], // check if already exists
            [
                'name' => 'Admin User',
                'username' => 'Administrator',
                'password' => Hash::make('admin123'),
                'avatar' => 'default-avatar.png',
                'phone' => '1234567890',
                'address' => 'Guwahati, Assam, India',
            ]
        );

        // Assign role
        $user->assignRole($adminRole);
    }
}
