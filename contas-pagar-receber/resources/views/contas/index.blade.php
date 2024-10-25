@extends('layouts.app')

@section('content')
<div class="container mx-auto my-8">
    <table class="table-auto border-collapse w-full">
        <thead>
            <tr>
                <th>ID</th>
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
                <td>{{ $conta->id }}</td>
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