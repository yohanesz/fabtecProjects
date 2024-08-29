


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

    <h1 class="display-5">índex setor</h1>

    @include('navbar')
    <br>

    <div class="d-flex justify-content-between mb-3">
        <form action="{{ route('setor.index') }}" method="get">
            <div class="d-flex gap-2">
                <input placeholder="Pesquisar perfil" class="form-control" type="text" name="filtro" id="filtro" value="{{ $filtro }}" style="margin-left: 20px;">
                <button class="btn btn-light border-secondary" type="submit">
                    <span class="d-flex align-items-center gap-1 text-secondary">
                        <i class="ri-search-line"></i>
                        Pesquisar
                    </span>
                </button>
            </div>
        </form>
   
        <a href="{{ route('setor.create') }}" class="btn btn-light-green border-green text-green" style="border: 1px solid rgb(0, 138, 0); background-color: rgb(117, 179, 117); margin-right:20px;">
            <span class="d-flex align-items-center gap-1">
                <i class="ri-add-line"></i>
                Novo setor
            </span>
        </a>
    </div>
    <table class="table table-hover" border="1px">
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
                <form action="{{route('setor.destroy', $item->id)}}" method="post" name="delete">
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" name="envia">Deletar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
</body>
</html>