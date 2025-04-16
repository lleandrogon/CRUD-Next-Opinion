@extends('estrutura.estrutura')

@section('css')
    <link rel="stylesheet" href="{{ asset('confirmacao/confirmacao.css') }}">
@endsection

@section('conteudo')
    <div class="container">
        <div class="card">
            <div class="card-header">Confirmar E-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                         <div class="alert alert-success">
                                Novo token enviado para seu e-mail.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('confirmacao.verificar') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="token">Token de 6 dígitos</label>
                            <input id="token" type="text" class="form-control @error('token') is-invalid @enderror" 
                                    name="token" required autofocus maxlength="6" pattern="\d{6}">
                            @error('token')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="botao-token d-flex justify-content-center mt-4">Confirmar E-mail</button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('confirmacao.reenviar') }}" class="mt-4">
                        @csrf
                        <input type="hidden" name="email" value="{{ old('email', session('email')) }}">
                        <button type="submit" class="reenviar">Não recebeu o token? Clique para reenviar</button>
                    </form>
                </div>
            </div>
    </div>
@endsection