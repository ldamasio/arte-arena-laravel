@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        <div class="p-4">
            {{ __('Relatórios') }}
        </div>
    </h2>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-50">
                    <h3 class="text-lg font-semibold mb-4">Resumo das Contas</h3>
                    <p>Total de Contas: {{ $totalContas }}</p>
                    <p>Total Pago: R$ {{ number_format($totalPago, 2, ',', '.') }}</p>
                    <p>Total Pendente: R$ {{ number_format($totalPendente, 2, ',', '.') }}</p>
                    <p>Total Pago + Total Pendente: R$ {{ number_format($totalPago + $totalPendente, 2, ',', '.') }}</p>
                </div>
            </div>

            <div class="bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-white">
                    <h3 class="text-lg font-semibold mb-4">Relatórios por Usuário</h3>
                    <table class="min-w-full divide-y divide-gray-50">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome do Usuário</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Pago</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Pendente</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($relatoriosPorUsuario as $relatorio)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $relatorio['nome'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">R$ {{ number_format($relatorio['totalPago'], 2, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">R$ {{ number_format($relatorio['totalPendente'], 2, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">R$ {{ number_format($relatorio['totalPago'] + $relatorio['totalPendente'], 2, ',', '.') }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap font-bold">Total</td>
                                <td class="px-6 py-4 whitespace-nowrap font-bold">R$ {{ number_format($totalPago, 2, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap font-bold">R$ {{ number_format($totalPendente, 2, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap font-bold">R$ {{ number_format($totalPago + $totalPendente, 2, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection