<fieldset>
    <div class="col-2s">
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" class="form-control" value="@if(isset($setorSelecionado->descricao)){{ $setorSelecionado->descricao }}@endif" required>
    </div>
    <br>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary" name="envia">Enviar</button>
    </div>
</fieldset>
</form>