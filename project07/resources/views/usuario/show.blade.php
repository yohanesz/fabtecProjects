@extends('app')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
@endpush

@section('body')

        <div class="mainContainer">
            <header>
                <nav>
                </nav>
            </header>
        <br>

    <table class="table table-hover" border="1px">
        <thead>
        <tr>
            <th scope="col">Id</th>  <th scope="col">Nome</th>  <th scope="col">E-mail</th> <th scope="col">Data de Nascimento</th> <th scope="col">Setor</th> <th scope="col">Perfil</th> <th scope="col">Funções</th>
        </tr>
        </thead>
        <tr>
            <td>{{$usuarioSelecionado->id}}</td>
            <td>{{$usuarioSelecionado->nome}}</td> 
            <td>{{$usuarioSelecionado->email}}</td>
            <td>{{$usuarioSelecionado->data_nascimento}}</td> 
            <td>{{$descricaoSetor}}</td>
            <td>{{$perfil}}</td>
            <td>
                <a href="{{route('funcao_usuarios.show', $usuarioSelecionado->id)}}"><button class="btn btn-dark">função</button></a>
            </td>
        </tr>
    </table>
        </div>
@endsection