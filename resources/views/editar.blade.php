@extends('estrutura.estrutura')

@section('css')
    <link rel="stylesheet" href="{{ asset('editar/editar.css') }}">
@endsection

@section('conteudo')
    <div class="container-geral">
        <div class="editar-container">
            <div class="titulo-container">
                <a href="{{ route('principal') }}"><i class="seta fa-solid fa-arrow-left"></i></a>
                <h2 class="editar-titulo">Editar Usuário!</h2>
            </div>

            <form class="editar-formulario" action="{{ route('usuario.update', $usuario->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Nome Completo" value="{{ $usuario->name }}">
                    @error('name')
                        <div class="erro">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $usuario->email }}">
                    @error('email')
                        <div class="erro">{{ $message }}</div>
                    @enderror
                </div>
                <div class="botao-editar-container">
                    <button type="submit" class="botao-editar">Editar</button>
                </div>
            </form>
        </div>
    </div>
@endsection