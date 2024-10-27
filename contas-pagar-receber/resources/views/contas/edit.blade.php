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
                    <select id="status" class="form-control @error('status') is-invalid @enderror border border-gray-50 rounded-md w-full bg-gray-600 text-white" name="status" required>
                        <option value="pago" {{ $conta->status == 'pago' ? 'selected' : '' }}>Pago</option>
                        <option value="pendente" {{ $conta->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
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
@endsection