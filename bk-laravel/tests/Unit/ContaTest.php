<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContaTest extends TestCase
{

    use RefreshDatabase;


    // public function test_usuario_pode_criar_uma_conta() {
    //     $user = User::factory()->create();
    //     $this->actingAs($user);
    
    //     $response = $this->post('/contas', [
    //         'titulo' => 'Conta de Luz',
    //         'descricao' => 'Conta de luz referente ao mês de agosto',
    //         'valor' => 150.00,
    //         'data_vencimento' => now()->addDays(10),
    //         'status' => 'pendente',
    //     ]);
    
    //     $response->assertStatus(302);
    //     $this->assertDatabaseHas('contas', ['titulo' => 'Conta de Luz']);
    // }

    public function test_usuario_pode_criar_uma_conta()
    {
        // Simulando a autenticação de um usuário
        $user = User::factory()->create(['role' => 'user']);
        $this->actingAs($user);
        
        // Dados para criar uma conta
        $response = $this->post(route('contas.store'), [
            'titulo' => 'Conta de Luz',
            'descricao' => 'Descrição da conta de luz',
            'valor' => 100.00,
            'data_vencimento' => now()->addDays(10),
            'status' => 'pendente',
        ]);
        
        // Verifica se foi redirecionado corretamente
        $response->assertStatus(302);
    
        // Verifica se os dados foram inseridos no banco
        $this->assertDatabaseHas('contas', ['titulo' => 'Conta de Luz']);
    }

}
