@extends('estrutura.estrutura')

@section('css')
    <link rel="stylesheet" href="{{ asset('login/login.css') }}">
@endsection

@section('conteudo')
    <div class="container-geral">
        <div class="row">
            <div class="login-container col-12 col-md-6">
                <div class="login-titulo-subtitulo">
                    <h2 class="login-titulo ">Bem Vindo!</h2>
                    <p class="login-subtitulo">Faça o login para acessar sua conta.</p>
                </div>
                <form class="login-formulario" action="{{ route('login.autenticar') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <div class="erro">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Senha" value="{{ old('password') }}">
                        @error('password')
                            <div class="erro">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="botao-login-container mb-3">
                        <button type="submit" class="botao-login">Entrar</button>
                    </div>
                    @if ($errors->has('auth'))
                        <div class="erro">{{ $errors->first('auth') }}</div>
                    @endif
                </form>
            </div>
            <div class="cadastro-container col-12 col-md-6">
                <h2 class="mb-3">Não possui cadastro?</h2>
                <p class="mb-3">Cadastre-se com suas credenciais pessoais e venha começar uma jornada conosco.</p>
                <a href="{{ route('cadastro.index') }}" class="botao-cadastrar sem-sublinhado mt-3">Cadastrar-se</a>
            </div>
        </div>
    </div>
@endsection