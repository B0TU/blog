<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('view category');
    }

    public function view(User $user, Category $category)
    {
        return $user->can('view category');
    }

    public function create(User $user)
    {
        return $user->can('create category');
    }

    public function update(User $user, Category $category)
    {
        return $user->can('update category');
    }

    public function delete(User $user, Category $category)
    {
        return $user->can('delete category');
    }

}
