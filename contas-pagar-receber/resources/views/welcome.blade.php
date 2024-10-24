@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="text-center">
        <h1 class="text-5xl font-bold text-gray-800 mb-4">Bem-vindo ao {{ config('app.name', 'Laravel') }}</h1>
        <p class="text-gray-600 text-lg mb-8">Gerencie suas contas a pagar e a receber de forma fácil e organizada.</p>
        
        <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-300">
            Ir para o Dashboard
        </a>
    </div>

    <div class="mt-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white shadow rounded-lg p-6 text-center">
                <h2 class="text-2xl font-bold text-gray-800">Controle de Contas</h2>
                <p class="text-gray-600 mt-2">Gerencie suas contas a pagar e a receber com facilidade.</p>
            </div>

            <div class="bg-white shadow rounded-lg p-6 text-center">
                <h2 class="text-2xl font-bold text-gray-800">Relatórios Personalizados</h2>
                <p class="text-gray-600 mt-2">Gere relatórios detalhados para manter o controle financeiro.</p>
            </div>

            <div class="bg-white shadow rounded-lg p-6 text-center">
                <h2 class="text-2xl font-bold text-gray-800">Notificações Automáticas</h2>
                <p class="text-gray-600 mt-2">Receba alertas e lembretes sobre vencimentos de contas.</p>
            </div>
        </div>
    </div>
</div>
@endsection
