<?php

namespace app\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Services\UserService;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }
    
    public function index(Request $request, UserService $userService)
    {
        $users = $userService->search($request->search);
        return view('admin.users.index', compact('users'));
        
    }

    public function create()
    {
        return view('admin.users.create', [
            'user' => new User(),
            'roles' => Role::select('id', 'name')->get()
        ]);
    }

    public function store(UserRequest $request, UserService $userService)
    {
        $user = $userService->store($request->validated());
        return to_route('admin.users.edit', $user);
    }

    public function show(User $user){
        
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::select('id', 'name')->get()
        ]);
    }

    public function update(UserRequest $request, User $user, UserService $userService)
    {
        $user = $userService->update($request->validated(), $user);
        return to_route('admin.users.edit', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return to_route('admin.users.index');
    }
}
