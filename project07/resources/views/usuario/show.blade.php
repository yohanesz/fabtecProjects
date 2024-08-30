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
</body>
</html>