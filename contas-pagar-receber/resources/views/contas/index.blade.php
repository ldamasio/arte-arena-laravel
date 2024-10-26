@extends('layouts.app')

@section('content')
<div class="container mx-auto my-8">
    <div class="p-4">
        <table class="text-gray-400 table-auto border-collapse w-full">
            <thead class="text-left text-gray-200">
                <tr>
                    <th class="py-2">Título</th>
                    <th class="py-2">Descrição</th>
                    <th class="py-2">Valor</th>
                    <th class="py-2">Data Vencimento</th>
                    <th class="py-2">Status</th>
                    <th class="py-2">Usuário</th>
                    <th class="py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contas as $conta)
                <tr>
                    <td>{{ $conta->titulo }}</td>
                    <td>{{ $conta->descricao }}</td>
                    <td>{{ $conta->valor }}</td>
                    <td>{{ $conta->data_vencimento }}</td>
                    <td>{{ $conta->status }}</td>
                    <td>{{ $conta->user->name }}</td>
                    <td>
                        <a href="{{ route('contas.edit', $conta->id) }}" class="text-blue-400 hover:text-blue-600">Editar</a>
                        <form action="{{ route('contas.destroy', $conta->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-600">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection