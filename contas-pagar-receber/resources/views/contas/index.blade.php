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
                    <th class="py-2">Usuario</th>
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
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection