@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="p-4">
        <h1 class="text-gray-500 text-center mb-8">
            Criar Nova Conta
        </h1>
    </div>
    <form method="POST" action="{{ route('contas.store') }}">
        @csrf
        <div class="space-y-4">
            <div>
                <label for="titulo" class="block text-gray-50 text-sm font-bold mb-2">Título:</label>
                <input type="text" class="border border-gray-300 rounded-md w-full" id="titulo" name="titulo" required>
            </div>
            <div>
                <label for="descricao" class="block text-gray-50 text-sm font-bold mb-2">Descrição:</label>
                <textarea class="border border-gray-300 rounded-md w-full" id="descricao" name="descricao" rows="3"></textarea>
            </div>
            <div>
                <label for="valor" class="block text-gray-50 text-sm font-bold mb-2">Valor:</label>
                <input type="number" step="0.01" class="border border-gray-300 rounded-md w-full" id="valor" name="valor" required>
            </div>
            <div>
                <label for="data_vencimento" class="block text-gray-50 text-sm font-bold mb-2">Data de Vencimento:</label>
                <input type="date" class="border border-gray-300 rounded-md w-full" id="data_vencimento" name="data_vencimento" required>
            </div>
            <div>
                <label for="status" class="block text-gray-50 text-sm font-bold mb-2">Status:</label>
                <select class="border border-gray-300 rounded-md w-full" id="status" name="status">
                    <option value="pago">Pago</option>
                    <option value="pendente">Pendente</option>
                </select>
            </div>
        </div>
        <button type="submit" class="py-2 px-6 btn bg-green-500 text-white mt-4 mb-8">Criar Conta</button>
    </form>
</div>
@endsection