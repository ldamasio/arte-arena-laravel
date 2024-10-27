@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="p-4">
        <h1 class="text-gray-500 text-center mb-8">
            Editar Conta
        </h1>
    </div>
    <form method="POST" action="{{ route('contas.update', $conta->id) }}">
        @csrf
        @method('PUT')
        <div class="space-y-4">
            <div class="form-row">
                <label for="tipo" class="block text-gray-50 text-sm font-bold mb-2">Tipo</label>
                <select name="tipo" id="tipo" class="form-control border-gray-50 rounded-md w-full bg-gray-600 text-white" required>
                    <option value="a pagar" {{ old('tipo', $conta->tipo ?? '') == 'a pagar' ? 'selected' : '' }}>A pagar</option>
                    <option value="a receber" {{ old('tipo', $conta->tipo ?? '') == 'a receber' ? 'selected' : '' }}>A receber</option>
                </select>
            </div>
            <div>
                <label for="titulo" class="block text-gray-50 text-sm font-bold mb-2">Título</label>
                <input id="titulo" type="text" class="border border-gray-50 rounded-md w-full bg-gray-600 text-white" name="titulo" value="{{ old('titulo', $conta->titulo) }}" required>
            </div>
            <div>
                <label for="descricao" class="block text-gray-50 text-sm font-bold mb-2">Descrição</label>
                <textarea id="descricao" class="border border-gray-50 rounded-md w-full bg-gray-600 text-white" name="descricao">{{ old('descricao', $conta->descricao) }}</textarea>
            </div>
            <div>
                <label for="valor" class="block text-gray-50 text-sm font-bold mb-2">Valor</label>
                <div class="col-m-6">
                    <input id="valor" type="number" class="form-control @error('valor') is-invalid @enderror border border-gray-50 rounded-md w-full bg-gray-600 text-white" name="valor" value="{{ old('valor', $conta->valor) }}" required>
                    @error('valor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-row">
                    <label for="data_vencimento" class="block text-gray-50 text-sm font-bold mb-2">Data de Vencimento</label>
                    <div class="col-md-6">
                        <input id="data_vencimento" type="date" class="form-control @error('data_vencimento') is-invalid @enderror border border-gray-50 rounded-md w-full bg-gray-600 text-white" name="data_vencimento" value="{{ old('data_vencimento', $conta->data_vencimento) }}" required>
                        @error('data_vencimento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <label for="status" class="block text-gray-50 text-sm font-bold mb-2">Status</label>
                    <div class="col-md-6">
                        <select class="border border-gray-50 rounded-md w-full bg-gray-600 text-white" id="status" name="status">
                            <option value="pendente" {{ old('status', $conta->status) == 'pendente' ? 'selected' : '' }}>Pendente</option>
                            <option value="pago" {{ old('status', $conta->status) == 'pago' ? 'selected' : '' }}>Pago</option>
                            <option value="recebido" {{ old('status', $conta->status) == 'recebido' ? 'selected' : '' }}>Recebido</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="py-2 px-6 btn bg-green-500 text-white mt-4 mb-8">
                {{ __('Atualizar Conta') }}
            </button>
    </form>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tipoSelect = document.getElementById('tipo');
    const statusSelect = document.getElementById('status');

    function updateStatusOptions() {
        const tipo = tipoSelect.value;
        const currentStatus = statusSelect.value;

        // Limpar opções existentes
        statusSelect.innerHTML = '';

        // Adicionar opções com base no tipo selecionado
        if (tipo === 'a pagar') {
            statusSelect.innerHTML = `
                <option value="pendente">Pendente</option>
                <option value="pago">Pago</option>
            `;
        } else if (tipo === 'a receber') {
            statusSelect.innerHTML = `
                <option value="pendente">Pendente</option>
                <option value="recebido">Recebido</option>
            `;
        }

        // Reselecionar o status atual se ainda for uma opção válida
        if (statusSelect.querySelector(`option[value="${currentStatus}"]`)) {
            statusSelect.value = currentStatus;
        } else {
            statusSelect.value = 'pendente';
        }
    }

    // Atualizar opções quando a página carrega
    updateStatusOptions();

    // Atualizar opções quando o tipo muda
    tipoSelect.addEventListener('change', updateStatusOptions);
});
</script>
@endsection
