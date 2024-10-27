<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function view(User $authenticatedUser, User $user)

    {
        return $authenticatedUser->role === 'admin';
    }

    public function update(User $authenticatedUser, User $user)
    {
        return $authenticatedUser->role === 'admin' && $user->role === 'user';
    }

    public function delete(User $authenticatedUser, User $user)
    {
        return $authenticatedUser->role === 'admin';
    }
}
