@extends('app')

@push('style')
<link rel="stylesheet" href="{{asset("css/index.css")}}">
@endpush

@section('body')


<div class="mainContainer">
    <header>
        <nav>
        </nav>
    </header>


    <br>
   
        <form action="{{ route('funcao_usuarios.store') }}" method="POST">
            <div class="d-flex justify-content-center">
            <fieldset class="d-flex justify-content-center flex-column p">
                <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">


                <div class="form-group">
                    <label for="funcao">Função:</label>
                    
                    <select name="funcaoSelecionada" class="form-control" style="width: 180px;">

                        @foreach($funcao as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->descricao }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <br>
                    <button type="submit" class="btn btn-primary mt-4" name="envia">Adicionar função</button>
                </div>
            </fieldset>
        </form>
    </div>

@endsection