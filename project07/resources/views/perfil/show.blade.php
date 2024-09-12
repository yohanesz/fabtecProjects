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
            <td>{{$perfilSelecionado->usuario_idusuario}}</td>
            <td>{{$perfilSelecionado->descricao}}</td> 
       
        </tr>
    </table>
        </div>
@endsection
