@extends('estrutura.estrutura')

@section('css')
    <link rel="stylesheet" href="{{ asset('principal/principal.css') }}">
@endsection

@section('conteudo')
    <div class="cabecalho">
        <form action="{{ route('login.logout') }}" method="POST">
            @csrf
            <button type="submit" aria-label="Logout">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
        </form>
        <h2 class="titulo">Gestão de Usuários</h2>
    </div>

    <div class="tabela-container">
        <table class="table table-striped">
            <thead class="cabecalho-tabela">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td><a href="{{ route('usuario.editar', $usuario->id) }}" class="caneta"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td>
                            <form action="{{ route('usuario.excluir', $usuario->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="lixo"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection