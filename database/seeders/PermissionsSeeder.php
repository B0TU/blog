<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{

    protected $permissions = [

    'category' => [
        'view category',
        'update category',
        'create category',
        'delete category'
    ],
        
    'post' => [
        'view others posts',
        'view posts',
        'update posts',
        'create posts',
        'delete posts',
        'approve posts'
    ],
        
    'users' => [
        'view users',
        'update users',
        'create users',
        'delete users'
    ],

    'pages' => [
        'view pages',
        'update pages',
        'create pages',
        'delete pages',
        'approve pages',
    ],

    'logs' => [
        'view logs'
    ],

    'roles' => [
        'view roles',
        'update roles',
        'create roles',
        'delete roles'
    ],

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->permissions as $model => $category_permissions) {
            
            foreach ($category_permissions as $permission_name) {

            $permission = Permission::where('name', $permission_name)->first();

            if ($permission) {
                continue;
            }

            $permission = Permission::create([
                'model' => $model,
                'name' => $permission_name
            ]);
            
            }
        }
    }
}
