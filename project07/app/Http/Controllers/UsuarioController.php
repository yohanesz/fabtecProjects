<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Usuario;
use App\Models\Setor;
use App\Models\Perfil;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Isset_;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $info = Usuario::all();

        $query = Usuario::query();

        if ($request->filled('search')) {
            $query->where('nome', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('month')) {
            $query->whereMonth('data_nascimento', $request->month);
        }

        if ($request->filled('setor_id')) {
            $query->where('id', $request->setor_id);
        }

        $setores = Setor::all();

        $info = $query->get();


        return view('usuario.index', ['info' => $info, 'setores' => $setores] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setores = Setor::all();
        return view('usuario.create', ['setores' => $setores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new Usuario();

        $usuario->nome = $request->input('nome');
        $usuario->email = $request->input('email');
        $usuario->data_nascimento = Carbon::createFromFormat('Y-m-d', $request->input('dataNascimento'));

        $usuario->setor_id = $request->input('setorSelecionado');
        
        $usuario->senha = $request->input('senha');
        
        try {
            $usuario->save();
        } catch (\Exception $e) {
        }

        return redirect()->route('usuario.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuarioSelecionado = Usuario::find($id);
        $setorUsuario = Setor::find($usuarioSelecionado->setor_id);
        $perfil = Perfil::find($id);

        
        
        $descricaoPerfil = $perfil ? $perfil->descricao : 'Perfil não encontrado';
        $descricaoSetor = $setorUsuario ? $setorUsuario->descricao : 'Desconhecido';

        return view('usuario.show', [
            'usuarioSelecionado' => $usuarioSelecionado,
            'descricaoSetor' => $descricaoSetor,
            'perfil' => $descricaoPerfil
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) //String com S maiúsculo?
    {
        $usuarioSelecionado = Usuario::find($id);

        $setores = Setor::all();

        return view('usuario.edit', 
        ['usuarioSelecionado'=> $usuarioSelecionado, 
        'setores'=>$setores]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = Usuario::find($id);

        $usuario->nome = $request->input('nome');
        $usuario->email = $request->input('email');
        $usuario->data_nascimento = Carbon::createFromFormat('Y-m-d', $request->input('dataNascimento'));
        $usuario->setor_id = $request->input('setorSelecionado');
        $usuario->senha = $request->input('senha');

        try {
            $usuario->save();
        } catch (\Exception $e) {
 
        }

        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $usuario = Usuario::findOrFail($id); 
            $perfil = Perfil::find($id); 
    

            if (isset($perfil)) {
                $perfil->delete();
            }
    
            $usuario->delete();
    
            return redirect()->route('usuario.index');
        } catch (\Exception $e) {
            return redirect()->route('usuario.index');
        }
    }
}
