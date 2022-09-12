<?php

namespace App\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\Permission\Models\Role;

class RoleService {

    public function search(string $search = null): LengthAwarePaginator
    {
        $roles = Role::query();

        if ( $search ) {
            $roles->search($search);
        }
            $roles = $roles->orderBy('id', 'desc')->paginate(5);

            return $roles;
    }

    public function store(array $role_data): Role
    {
        $role = new Role();
        $role->name = data_get($role_data, 'name');
        $role->save();

        $role->syncPermissions(data_get($role_data, 'permissions'), []);

        return $role;

    }

    public function update(Role $role, array $role_data): Role
    {
        
        $role->name = data_get($role_data, 'name');
        $role->save();
        
        $role->syncPermissions(data_get($role_data, 'permissions'), []);

        return $role;

    }

}