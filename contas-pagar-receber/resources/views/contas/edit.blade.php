@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Conta</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contas.update', $conta->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <label for="titulo" class="col-form-label text-md-right">{{ __('Título') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo', $conta->titulo) }}" required autocomplete="titulo" autofocus>

                                @error('titulo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <label for="descricao" class="col-form-label text-md-right">{{ __('Descrição') }}</label>

                            <div class="col-md-6">
                                <textarea id="descricao" class="form-control @error('descricao') is-invalid @enderror" name="descricao" required autocomplete="descricao">{{ old('descricao', $conta->descricao) }}</textarea>

                                @error('descricao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <label for="valor" class="col-form-label text-md-right">{{ __('Valor') }}</label>

                            <div class="col-md-6">
                                <input id="valor" type="number" class="form-control @error('valor') is-invalid @enderror" name="valor" value="{{ old('valor', $conta->valor) }}" required autocomplete="valor">

                                @error('valor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <label for="data_vencimento" class="col-form-label text-md-right">{{ __('Data de Vencimento') }}</label>

                            <div class="col-md-6">
                                <input id="data_vencimento" type="date" class="form-control @error('data_vencimento') is-invalid @enderror" name="data_vencimento" value="{{ old('data_vencimento', $conta->data_vencimento) }}" required autocomplete="data_vencimento">

                                @error('data_vencimento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <label for="status" class="col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required autocomplete="status">
                                    <option value="ativo" {{ $conta->status == 'ativo' ? 'selected' : '' }}>Ativo</option>
                                    <option value="inativo" {{ $conta->status == 'inativo' ? 'selected' : '' }}>Inativo</option>
                                </select>

                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Atualizar Conta') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection