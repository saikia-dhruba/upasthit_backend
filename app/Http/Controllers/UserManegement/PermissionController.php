<?php

namespace App\Http\Controllers\UserManegement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::withCount('roles')->get()->groupBy(function ($permission) {
            // Group by the part before the first dot.
            return explode('.', $permission->name)[0];
        });

        return view('user-management.permissions', compact('permissions'));
    }

    public function sync()
    {
        $definedPermissions = config('permissions');
        $count = 0;

        foreach ($definedPermissions as $group => $permissions) {
            foreach ($permissions as $permissionName) {
                Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);
                $count++;
            }
        }

        // Optional: You could also remove permissions that are no longer in the config file.

        return redirect()->route('user.permissions.index')->with('success', "Permissions synced successfully. Found {$count} permissions.");
    }
}
