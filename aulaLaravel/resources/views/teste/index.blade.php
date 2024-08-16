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

    <h1 class="display-5">Cadastro</h1>

    <ul class="nav nav-tabs" >
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('aula4.index')}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('aula4.create')}}">Cadastrar</a>
        </li>
    </ul>
    <br>

    <table class="table table-hover" border="1px">
        <thead>
        <tr>
            <th scope="col">Id</th>  <th scope="col">Nome</th>  <th scope="col">E-mail</th> <th scope="col">Detalhes</th> <th scope="col">Alterar</th> <th scope="col">Excluir</th>
        </tr>
        </thead>
        @foreach ($info as $item)
        
        <tr">
            <td>{{$item->id}}</td>
            <td>{{$item->nome}}</td> 
            <td>{{$item->email}}</td> 
            <td>
                <a href="{{route('aula4.show', $item->id)}}"><button class="btn btn-dark">Detalhes</button></a>
            </td>
            <td>
                <a href="{{route('aula4.edit', $item->id)}}"><button class="btn btn-dark">Alterar</button></a>
            </td>
            <td>
                <form action="{{route('aula4.destroy', $item->id)}}" method="post" name="delete">
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" name="envia">Deletar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
</body>
</html>