@extends('app')

@push('style')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endpush

@section('body')


    <div class="mainContainer">
        <header>
            <nav>
            </nav>
        </header>


        <br>
        
        <div class="d-flex justify-content-end">

            <a href="{{ route('funcao_usuarios.addFunctionToUser', $usuario->id) }}" class="btn btn-success">
                <span class="d-flex align-items-center gap-1">
                    <i class="ri-add-line"></i>
                    Adicionar função
                </span> 
            </a>
        </div>


<table class="table table-hover" border="1px">
    <thead>
        <tr>
            <th scope="col">Id</th>  <th scope="col">Função</th> <th scope="col"></th> <th scope="col"></th> <th scope="col"></th> <th scope="col"></th> <th scope="col">Deletar</th>
        </tr>
    </thead>
    @foreach($funcoes as $funcao)
    <tr>
        <td>{{$funcao->id}}</td>
        <td>{{$funcao->descricao}}</td> 
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <form action="{{route('funcao_usuarios.destroy', [$usuario->id, $funcao->id])}}" method="post" name="delete">
                @method('DELETE')
                <button type="submit" class="btn btn-danger" name="envia">Deletar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</div>


@endsection