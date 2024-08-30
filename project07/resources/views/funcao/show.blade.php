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
</body>
</html>