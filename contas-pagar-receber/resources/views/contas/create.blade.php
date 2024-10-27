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
                <label for="tipo" class="block text-gray-50 text-sm font-bold mb-2">Tipo</label>
                <select name="tipo" id="tipo" class="form-control border-gray-50 rounded-md w-full bg-gray-600 text-white" required>
                    <option value="a pagar" {{ old('tipo', $conta->tipo ?? '') == 'a pagar' ? 'selected' : '' }}>A pagar</option>
                    <option value="a receber" {{ old('tipo', $conta->tipo ?? '') == 'a receber' ? 'selected' : '' }}>A receber</option>
                </select>
            </div>
            <div>
                <label for="titulo" class="block text-gray-50 text-sm font-bold mb-2">Título:</label>
                <input type="text" class="border border-gray-50 rounded-md w-full bg-gray-600 text-white" id="titulo" name="titulo" required>
            </div>
            <div>
                <label for="descricao" class="block text-gray-50 text-sm font-bold mb-2">Descrição:</label>
                <textarea class="border border-gray-50 rounded-md w-full bg-gray-600 text-white" id="descricao" name="descricao" rows="3"></textarea>
            </div>
            <div>
                <label for="valor" class="block text-gray-50 text-sm font-bold mb-2">Valor:</label>
                <input type="number" step="0.01" class="border border-gray-50 rounded-md w-full bg-gray-600 text-white" id="valor" name="valor" required>
            </div>
            <div>
                <label for="data_vencimento" class="block text-gray-50 text-sm font-bold mb-2">Data de Vencimento:</label>
                <input type="date" class="border border-gray-50 rounded-md w-full bg-gray-600 text-white" id="data_vencimento" name="data_vencimento" required>
            </div>
            <div>
                <label for="status" class="block text-gray-50 text-sm font-bold mb-2">Status:</label>
                <select class="border border-gray-50 rounded-md w-full bg-gray-600 text-white" id="status" name="status">
                    <option value="pendente" selected>Pendente</option>
                </select>
            </div>
        </div>
        <button type="submit" class="py-2 px-6 btn bg-green-500 text-white mt-4 mb-8">
            Criar Conta
        </button>
    </form>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tipoSelect = document.getElementById('tipo');
    const statusSelect = document.getElementById('status');

    function updateStatusOptions() {
        const tipo = tipoSelect.value;

        // Limpar opções existentes
        statusSelect.innerHTML = '';

        // Adicionar opções com base no tipo selecionado
        if (tipo === 'a pagar') {
            statusSelect.innerHTML = `
                <option value="pendente" selected>Pendente</option>
                <option value="pago">Pago</option>
            `;
        } else if (tipo === 'a receber') {
            statusSelect.innerHTML = `
                <option value="pendente" selected>Pendente</option>
                <option value="recebido">Recebido</option>
            `;
        }
    }

    // Atualizar opções quando a página carrega
    updateStatusOptions();

    // Atualizar opções quando o tipo muda
    tipoSelect.addEventListener('change', updateStatusOptions);
});
</script>
@endsection