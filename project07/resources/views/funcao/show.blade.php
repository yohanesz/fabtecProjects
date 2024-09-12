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
            <th scope="col">Id</th>  <th scope="col">Descrição</th>
        </tr>
        </thead>
        <tr>
            <td>{{$funcao->id}}</td>
            <td>{{$funcao->descricao}}</td> 
       
        </tr>
    </table>

    <br>
    <h2>Cadastrados na função: </h2>
    <br>

    <table class="table table-hover" border="1px">
        <thead>
        <tr>
            <th scope="col">Id</th>  <th scope="col">Nome</th>
        </tr>
        </thead>
        @foreach($usuario as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->nome}}</td> 
        </tr>
        @endforeach
    </table>
        </div>
@endsection