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

    <div class="d-flex justify-content-between mb-3">
        <form action="{{ route('setor.index') }}" method="get">
            <div class="d-flex gap-2">
                <input placeholder="Pesquisar perfil" class="form-control" type="text" name="filtro" id="filtro" value="{{ $filtro }}" style="margin-left: 20px;">
                <button class="btn btn-primary" type="submit">
                    <span class="d-flex align-items-center gap-1 text">
                        <i class="ri-search-line"></i>
                        Pesquisar
                    </span>
                </button>
            </div>
        </form>
   
        <a href="{{ route('setor.create') }}" class="btn btn-success">
            <span class="d-flex align-items-center gap-1">
                <i class="ri-add-line"></i>
                Novo setor
            </span>
        </a>
    </div>
    <table class="table table-hover table-dark" border="1px">
        <thead>
        <tr>
            <th scope="col">Id</th>  <th scope="col">Descricao</th>  <th scope="col"></th> <th scope="col"></th><th scope="col"></th><th scope="col">Detalhar</th> <th scope="col">Alterar</th> <th scope="col">Excluir</th>
        </tr>
        </thead>
        @foreach ($info as $item)

        <tr">
            <td>{{$item->id}}</td>
            <td>{{$item->descricao}}</td> 
            <td></td>
            <td></td>
            <td></td>

            <td>
                <a href="{{route('setor.show', $item->id)}}"><button class="btn btn-dark">Detalhes</button></a>
            </td>
            <td>
                <a href="{{route('setor.edit', $item->id)}}"><button class="btn btn-dark">Alterar</button></a>
            </td>
            <td>
                <form id="{{$item->id}}" action="{{route('setor.destroy', $item->id)}}" method="post" name="delete">
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" name="envia" onclick="confirmDelete({{$item->id}})">Deletar</button>
                </form>
               
            </td>
        </tr>
    @endforeach
    </table>
    </div>

    @push('script')
    <script src="{{asset('js/confirmDelete.js')}}"></script>
    @endpush
    
@endsection
</html>