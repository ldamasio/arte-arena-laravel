@extends('layouts.app')

@section('content')
<h1 class="text-gray-500 text-center mb-8">Conta criada com sucesso!</h1>
<p class="text-gray-300 text-center mb-8">Você pode voltar para a lista de contas.</p>

<div class="text-center mb-8">
    <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-300">
        Voltar
    </a>
</div>
@endsection