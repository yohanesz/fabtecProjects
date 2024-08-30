<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

    <h1 class="display-5">Cadastro</h1>

    @include('navbar')
    <br>

    <div class="d-flex justify-content-center">
        <form action="{{ route('funcao_usuarios.store') }}" method="POST">
            <fieldset>
                <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">


                <div class="form-group">
                    <label for="funcao">Função:</label>
                    
                    <select name="funcaoSelecionada" class="form-control">

                        @foreach($funcao as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->descricao }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark" name="envia">Adicionar função</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>