@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        <div class="p-4">
            {{ __('Dashboard') }}
        </div>
    </h2>
    <div class="card-body text-white p-4"
        style="background-color: {{ auth()->user()->role === 'admin' ? '#38a169' : '#23252a' }};">
        @if(auth()->user()->role === 'admin')
        Você é um admin!
        @elseif(auth()->user()->role === 'user')
        Você não é um admin.
        @else
        <p>Role inválido.</p>
        @endif
    </div>
</div>
@endsection