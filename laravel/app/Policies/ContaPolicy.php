<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Conta;

class ContaPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user) {
        return $user->role === 'admin';
    }
    
    public function view(User $user, Conta $conta) {
        return $user->role === 'admin' || $user->id === $conta->user_id;
    }
    
    public function create(User $user) {
        return $user->role === 'user';
    }
    
    public function update(User $user, Conta $conta) {
        return $user->id === $conta->user_id;
    }
    
    public function delete(User $user, Conta $conta) {
        return $user->id === $conta->user_id;
    }
}
