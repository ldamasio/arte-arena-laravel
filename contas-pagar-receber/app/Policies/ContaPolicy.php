<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Conta;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        // Admin pode ver todas as contas
        return $user->role === 'admin';
    }

    public function view(User $user, Conta $conta)
    {
        return true;
    }

    public function create(User $user)
    {
        // Tanto usuários comuns quanto admins podem criar contas
        return true;
    }

    public function edit(User $user, Conta $conta)
    {
        return $user->role === 'admin' || $user->id === $conta->user_id;
    }

    public function update(User $user, Conta $conta)
    {
        // Admins podem atualizar qualquer conta, usuários comuns apenas as suas
        return $user->role === 'admin' || $user->id === $conta->user_id;
    }

    public function delete(User $user, Conta $conta)
    {
        // Admins podem excluir qualquer conta, usuários comuns apenas as suas
        return $user->role === 'admin' || $user->id === $conta->user_id;
    }
}
