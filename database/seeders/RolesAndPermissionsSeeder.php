<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Sync permissions from config
        $definedPermissions = config('permissions');
        foreach ($definedPermissions as $group => $permissions) {
            foreach ($permissions as $permissionName) {
                Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);
            }
        }

        // Create roles and assign created permissions
        // $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        // $adminRole->givePermissionTo(Permission::all());



        // Create a demo user and assign the admin role

    }
}
