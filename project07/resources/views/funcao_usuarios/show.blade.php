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

    <h1 class="display-5">Editar</h1>

    @include('navbar')
    <br>

    <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('funcao_usuarios.addFunctionToUser', $usuario->id) }}" class="btn btn-light-green border-green text-green" style="margin-right:20px; border: 1px solid rgb(0, 138, 0); background-color: rgb(117, 179, 117);>
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
</body>
</html>