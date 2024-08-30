
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

    <h1 class="display-5">índex funcao_usuarios</h1>

    @include('navbar')
    <br>

    <div class="d-flex justify-content-between mb-3">
        <form action="{{ route('funcao_usuarios.index') }}" method="get">
            <div class="d-flex gap-2">
                <input placeholder="Pesquisar funcao_usuarios" class="form-control" type="text" name="filtro" id="filtro" value="{{ $filtro }}" style="margin-left: 20px;">
                <button class="btn btn-light border-secondary" type="submit">
                    <span class="d-flex align-items-center gap-1 text-secondary">
                        <i class="ri-search-line"></i>
                        Pesquisar
                    </span>
                </button>
            </div>
        </form>

        <a href="{{ route('funcao_usuarios.create') }}" class="btn btn-light-green border-green text-green" style="margin-right:20px; border: 1px solid rgb(0, 138, 0); background-color: rgb(117, 179, 117);>
            <span class="d-flex align-items-center gap-1">
                <i class="ri-add-line"></i>
                Novo funcao_usuarios
            </span>
        </a>
    </div>

    <table class="table table-hover" border="1px">
        <thead>
        <tr>
            <th scope="col">Id</th>  <th scope="col">Descricao</th>  <th scope="col"></th> <th scope="col"></th><th scope="col"></th><th scope="col">Detalhar</th> <th scope="col">Alterar</th> <th scope="col">Excluir</th>
        </tr>
        </thead>
        @foreach ($usuarios as $item)

        <tr">
            <td>{{$item->nome}}</td>
            <td>{{$item->email}}</td> 
            <td></td>
            <td></td>
            <td></td>
            

            <td>
                <a href="{{route('funcao_usuarios.show', $item->id)}}"><button class="btn btn-dark">Detalhes</button></a>
            </td>
            <td>
                <a href="{{route('funcao_usuarios.edit', $item->id)}}"><button class="btn btn-dark">Alterar</button></a>
            </td>
            <td>
                <form action="{{route('funcao_usuarios.destroy', $item->id)}}" method="post" name="delete">
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" name="envia">Deletar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
</body>
</html>