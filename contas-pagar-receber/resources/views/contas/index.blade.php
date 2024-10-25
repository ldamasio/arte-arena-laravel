@extends('layouts.app')

@section('content')
<div class="container mx-auto my-8">
    <table class="text-gray-400 table-auto border-collapse w-full">
        <thead class="text-left text-gray-200">
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Data Vencimento</th>
                <th>Status</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection