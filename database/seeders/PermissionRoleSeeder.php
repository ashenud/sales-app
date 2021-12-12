<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assign all permissions to the sales manager role
        $all_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($all_permissions->pluck('id'));
    }
}
