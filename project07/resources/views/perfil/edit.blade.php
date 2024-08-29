<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

    <h1 class="display-5">Editar perfil</h1>

    @include('navbar')
    <br>
    <div class="d-flex justify-content-center">
    <form action="{{ route('perfil.update', $perfilSelecionado->usuario_idusuario) }}" method="POST">
        @method('PUT')
        <fieldset>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" class="form-control" value="{{ $perfilSelecionado->descricao }}" required>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-dark" name="envia">Enviar</button>
        </div>
    </fieldset>
    </form>
</div>
</body>
</html>
