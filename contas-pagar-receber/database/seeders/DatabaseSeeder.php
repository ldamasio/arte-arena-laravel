<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Conta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria o usuário Rogério Ceni
        User::create([
            'name' => 'Rogério Ceni',
            'email' => 'rogerio@artearena.com.br',
            'password' => Hash::make('artearena'),
            'role' => 'user',
        ]);

        // Cria o usuário Gabriel
        User::create([
            'name' => 'Gabriel',
            'email' => 'gabriel@artearena.com.br',
            'password' => Hash::make('artearena'),
            'role' => 'admin',
        ]);

        $rogerioCeni = User::where('name', 'Rogério Ceni')->first();
        $gabriel = User::where('name', 'Gabriel')->first();

        // Criando contas para Rogério Ceni
        $gabriel->contas()->create([
            'titulo' => 'Aluguel',
            'descricao' => 'Aluguel do galpão',
            'valor' => 3500.00,
            'data_vencimento' => '2023-08-31',
            'status' => 'pago',
            'tipo' => 'a pagar',
        ]);
        $gabriel->contas()->create([
            'titulo' => 'Aluguel',
            'descricao' => 'Aluguel do apartamento',
            'valor' => 1500.00,
            'data_vencimento' => '2024-12-31',
            'status' => 'pendente',
            'tipo' => 'a pagar',
        ]);
        $gabriel->contas()->create([
            'titulo' => 'IRPF',
            'descricao' => 'Imposto',
            'valor' => 400.00,
            'data_vencimento' => '2024-12-31',
            'status' => 'pendente',
            'tipo' => 'a pagar',
        ]);

        // Criando contas para Gabriel
        $rogerioCeni->contas()->create([
            'titulo' => 'Conta de luz',
            'descricao' => 'Consumo de energia elétrica',
            'valor' => 200.00,
            'data_vencimento' => '2023-12-10',
            'status' => 'pago',
            'tipo' => 'a pagar',
        ]);
        $rogerioCeni->contas()->create([
            'titulo' => 'material de escritório',
            'descricao' => 'Kalunga',
            'valor' => 163.00,
            'data_vencimento' => '2021-12-20',
            'status' => 'pago',
            'tipo' => 'a pagar',
        ]);
        $rogerioCeni->contas()->create([
            'titulo' => 'Projeto Bandeira SPFC',
            'descricao' => 'Contratação de serviço',
            'valor' => 610.00,
            'data_vencimento' => '2025-01-13',
            'status' => 'pendente',
            'tipo' => 'a receber',
        ]);
        $rogerioCeni->contas()->create([
            'titulo' => 'Projeto Canecas Tigre',
            'descricao' => 'Contratação de serviço',
            'valor' => 347.00,
            'data_vencimento' => '2025-02-03',
            'status' => 'recebido',
            'tipo' => 'a receber',
        ]);
    }
}
