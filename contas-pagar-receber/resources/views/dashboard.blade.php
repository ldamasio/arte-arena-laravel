<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        <div class="card-body">
            @if(auth()->user()->role === 'admin')

            Você é um admin!
            @elseif(auth()->user()->role === 'user')
            Você não é um admin.
            @else
            <p>Role inválido.</p>
            @endif
        </div>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">


                            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'user')
                            <a href="{{ route('criar.conta') }}" class="btn btn-primary">Criar Nova Conta</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>