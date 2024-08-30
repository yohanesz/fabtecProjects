<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcao_usuario;
use App\Models\Usuario;
use App\Models\Funcao;
use App\Models\Funcao_usuarios;
use Illuminate\Support\Facades\DB;


class Funcao_usuariosController extends Controller
{
   
    public function store(Request $request)
    {
        $funcao = new Funcao_usuarios();

        $id = $request->input('usuario_id');
    
        DB::table('funcao_usuarios')->insert([
            'usuario_id' => $id,
            'funcao_id' => $request->input('funcaoSelecionada'),
            'dataInicio' => now()
        ]);

        return redirect()->route('funcao_usuarios.show', $id);
    }
    

    public function show(string $id) 
    {
        $usuario = Usuario::find($id);
        $funcoes = $usuario->funcao()->orderBy('dataInicio', 'asc')->get();
    
        if ($funcoes->isEmpty()) {
            $funcoes->id = null;
            $funcoes->descricao = null;
        }

        return view('funcao_usuarios.show', ['funcoes' => $funcoes, 'usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
   
    public function destroy(string $usuario_id, string $funcao_id)
    {
        $funcaoUsuario = Funcao_usuarios::where('usuario_id', $usuario_id)
        ->where('funcao_id', $funcao_id);

        if ($funcaoUsuario) {
            DB::table('funcao_usuarios')
                ->where('usuario_id', $usuario_id)
                ->where('funcao_id', $funcao_id)
                ->delete();
        }

        return redirect()->route('funcao_usuarios.show', $usuario_id);

    }

    public function addFunctioToUser(string $id) {
       
        $usuario = Usuario::find($id);
    
    
        $funcoesDoUsuario = $usuario->funcao->pluck('id');
        $funcoesNaoAssociadas = Funcao::whereNotIn('id', $funcoesDoUsuario)->get();
    
    
        return view('funcao_usuarios.create', [
            'usuario' => $usuario,
            'funcao' => $funcoesNaoAssociadas
        ]);
    }
    
    
}
