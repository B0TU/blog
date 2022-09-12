<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Services\RoleService;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class);
    }

    public function index(Request $request, RoleService $roleService)
    {
        $roles = $roleService->search($request->search);
        return view('admin.roles.index', compact('roles'));
        
    }

    public function create()
    {
        return view('admin.roles.create', [
            'role' => new Role(),
            'permissions' => Permission::select('id', 'name', 'model')->get()->groupBy('model')
        ]);
    }

    public function store(RoleRequest $request, RoleService $roleService)
    {
        $role = $roleService->store($request->validated());
        return to_route('admin.roles.edit', $role);
    }

    public function show(Role $role){
        
        return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::select('id', 'name', 'model')->get()->groupBy('model')
        ]);
    }

    public function update(Role $role, RoleRequest $request, RoleService $roleService)
    {
        $role = $roleService->update($role, $request->validated());
        return to_route('admin.roles.edit', $role);
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return to_route('admin.roles.index');
    }
}
