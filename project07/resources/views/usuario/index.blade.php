


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

    <h1 class="display-5">índex usuário</h1>

    @include('navbar')
    <br>
    <form action="{{ route('usuario.index') }}" method="GET" class="mb-3 d-flex justify-content-between">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <input type="text" name="search" class="form-control ms-3" placeholder="Pesquisar por nome ou email" value="{{ request('search') }}" style="width: 250px;">
            </div>
            <div class="col-auto">
                <select name="month" class="form-control" style="width: 180px;">
                    <option value="">Selecione o mês</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>
                            {{ strftime('%B', mktime(0, 0, 0, $month, 1)) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <select name="setor_id" class="form-select">
                    <option value="">Selecione o setor</option>
                    @foreach($setores as $setor)
                        <option value="{{ $setor->id }}" {{ request('setor_id') == $setor->id ? 'selected' : '' }}>
                            {{ $setor->descricao}}
                        </option>
                    @endforeach
                </select>                
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Aplicar</button>
            </div>
        </div>
        <a href="{{ route('usuario.create') }}" class="btn btn-light-green border-green text-green" style="margin-right:20px; border: 1px solid rgb(0, 138, 0); background-color: rgb(117, 179, 117);"">
            <span class="d-flex align-items-center gap-1">
                <i class="ri-add-line"></i>
                Novo usuário
            </span>
        </a>
    </form>


    <table class="table table-hover" border="1px">
        <thead>
        <tr>
            <th scope="col">Id</th>  <th scope="col">Nome</th>  <th scope="col">E-mail</th> <th scope="col">Data Nascimento</th> <th scope="col">Detalhar</th> <th scope="col">Alterar</th> <th scope="col">Excluir</th>
        </tr>
        </thead>
        @foreach ($info as $item)

        <tr">
            <td>{{$item->id}}</td>
            <td>{{$item->nome}}</td> 
            <td>{{$item->email}}</td> 
            <td>{{$item->data_nascimento}}</td>

            <td>
                <a href="{{route('usuario.show', $item->id)}}"><button class="btn btn-dark">Detalhes</button></a>
            </td>
            <td>
                <a href="{{route('usuario.edit', $item->id)}}"><button class="btn btn-dark">Alterar</button></a>
            </td>
            <td>
                <form action="{{route('usuario.destroy', $item->id)}}" method="post" name="delete">
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" name="envia">Deletar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
</body>
</html>