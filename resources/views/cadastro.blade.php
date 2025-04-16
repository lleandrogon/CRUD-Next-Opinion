@extends('estrutura.estrutura')

@section('css')
    <link rel="stylesheet" href="{{ asset('cadastro/cadastro.css') }}">
@endsection

@section('conteudo')
    <div class="container-geral">
        <div class="cadastro-container">
            <div class="titulo-container">
                <h2 class="cadastro-titulo">Registre-se!</h2>
                <i class="exclamacao fa-solid fa-exclamation"></i>
            </div>

            <form class="cadastro-formulario" action="{{ route('cadastro.adicionar') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Nome Completo">
                    @error('name')
                        <div class="erro">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                    @error('email')
                        <div class="erro">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Senha">
                    @error('password')
                        <div class="erro">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme sua senha!" required>
                </div>
                <div class="botao-cadastrar-container">
                    <button type="submit" class="botao-cadastrar">Registrar</button>
                </div>
            </form>

            <div class="login-link-container">
                Já tem uma conta? <a href="{{ route('login.index') }}" class="login-link sem-sublinhado">Faça login</a>
            </div>
        </div>
    </div>
@endsection