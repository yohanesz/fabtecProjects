<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

    <h1 class="display-5">Editar Usuário</h1>

    @include('navbar')
    <br>
    <div class="d-flex justify-content-center">
    <form action="{{ route('usuario.update', $usuarioSelecionado->id) }}" method="POST">
        @method('PUT')
        
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control" value="{{ $usuarioSelecionado->nome }}" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $usuarioSelecionado->email }}" required>
        </div>

        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" name="dataNascimento" class="form-control" value="{{ $usuarioSelecionado->data_nascimento}}" required>
        </div>

        <div class="form-group">
            <label for="setor_id">Setor:</label>
            <select name="setorSelecionado" class="form-control">
                @foreach($setores as $setor)
                    <option value="{{ $setor->id }}" {{ $setor->id == $usuarioSelecionado->setor_id ? 'selected' : '' }}>
                        {{ $setor->descricao }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>

</body>
</html>
