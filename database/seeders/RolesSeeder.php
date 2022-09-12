<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::updateOrCreate(['name' => 'Administrator']);
        $permissions = Permission::all();
        $role->syncPermissions($permissions);

        $admin = User::where('id',1)->first();
        $admin->syncRoles('Administrator');
    }
}
