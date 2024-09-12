<fieldset>
    <div class=class="col-2s>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" class="form-control" value="@if(isset($perfilSelecionado)){{ $perfilSelecionado->descricao }}@endif" required>
    </div>
    <div class=class="col-2s>
        <label for="usuario">Usuários:</label>
        <select name="usuario" id="usuario" class="form-control">
            @foreach($usuarios as $user)
                <option value="{{ $user->id }}" 
                    @if(isset($usuarioSelecionado) && $usuarioSelecionado->id == $user->id) 
                        selected 
                    @endif>
                    {{ $user->nome }}
                </option> 
            @endforeach
        </select>
    </div>

    <br>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary" name="envia">Enviar</button>
    </div>
</fieldset>
