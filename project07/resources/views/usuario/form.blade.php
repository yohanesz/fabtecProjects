<div class="d-flex justify-content-center flex-column align-items-center">
<div class="form-group col-2">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" class="form-control" value="@if(isset($usuarioSelecionado->nome)){{ $usuarioSelecionado->nome }}@endif" required>
</div>

<div class="col-2">
    <label for="email">Email:</label>
    <input type="email" name="email" class="form-control" value="@if(isset($usuarioSelecionado->email)) {{ $usuarioSelecionado->email }}@endif" required>
</div>


<div class="col-2">
    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="date" name="dataNascimento" class="form-control" value="@if(isset($usuarioSelecionado->data_nascimento)){{ $usuarioSelecionado->data_nascimento}}@endif" required>
</div>

<div class="col-2">
    <label for="senha">Senha:</label>
    <input type="password" name="senha" class="form-control" value="@if(isset($usuarioSelecionado->senha)){{ $usuarioSelecionado->senha}}@endif" required>
</div>

<div class="col-2">
    <label for="setor_id">Setor:</label>
    <select name="setorSelecionado" class="form-control">
        @foreach($setores as $setor)
            <option value="{{ $setor->id }}" @if(isset($usuarioSelecionado->setor_id)){{ $setor->id == $usuarioSelecionado->setor_id ? 'selected' : '' }}@endif>
                {{ $setor->descricao }}
            </option>
        @endforeach
    </select>
</div>
<br>
<button type="submit" class="btn btn-primary mt-4">Enviar</button>
</div>
</form>