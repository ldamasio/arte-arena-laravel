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

    public function viewAny(User $user) {
        // Admin pode ver todas as contas
        return $user->role === 'admin';
    }
    
    public function view(User $user, Conta $conta) {
        // Admin pode ver todas as contas, usuários comuns apenas suas próprias
        return $user->role === 'admin' || $user->id === $conta->user_id;
    }
    
    public function create(User $user) {
        // Usuários comuns podem criar contas
        return $user->role === 'user';
    }
    
    public function update(User $user, Conta $conta) {
        // Usuários só podem editar suas próprias contas
        return $user->id === $conta->user_id;
    }
    
    public function delete(User $user, Conta $conta) {
        // Usuários só podem excluir suas próprias contas
        return $user->id === $conta->user_id;
    }
}
