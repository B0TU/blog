<?php

namespace App\Policies;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('view logs');
    }

    public function view(User $user, Activity $activity)
    {
        return $user->can('view logs');
    }


}
