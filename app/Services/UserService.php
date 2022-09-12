<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService {

    public function search(string $search = null): LengthAwarePaginator
    {
        $users = User::query();

        if ( $search ) {
            $users->search($search);
        }
            $users = $users->orderBy('id', 'desc')->paginate(5);

        return $users;
    }

    public function store(array $user_data): User
    {
        $user = new User();
        $user->fill($user_data);
        $user->password = bcrypt(data_get($user_data, 'password'));
        $user->state = 'pending';
        $user->save();

        $user->syncRoles(data_get($user_data, 'role'));

        return $user;

    }

    public function update(array $user_data, User $user): User
    {
        
        $user->fill($user_data);
        
        $password = data_get($user_data, 'password');

        if ($password) {
            $user->password = bcrypt(data_get($user_data, 'password'));
            $user->save();
        }

        $user->syncRoles(data_get($user_data, 'role'));

        return $user;

    }

}