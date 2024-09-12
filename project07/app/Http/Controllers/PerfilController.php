<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $filtro = request()->input('filtro');
    
        $info = Perfil::where('descricao', 'LIKE', $filtro.'%')->paginate(12); //ou get
        // try {
        // } catch (\Exception $e) {
        //     return redirect()->route('perfil.index')->with('toast', ['type' => 'danger', 'message' => 'Erro ao carregar perfis: ' . $e->getMessage()]);
        // }
    
        return view('perfil.index')->with(['info' => $info])->with('filtro', $filtro);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $usersDisponiveis = Usuario::leftJoin('perfils', 'usuarios.id', '=', 'perfils.usuario_idusuario')
                ->whereNull('perfils.usuario_idusuario')
                ->select('usuarios.*')
                ->get();
        } catch (\Exception $e) {
            return redirect()->route('perfil.index')->with('toast', ['type' => 'danger', 'message' => 'Erro ao carregar usuários disponíveis: ' . $e->getMessage()]);
        }

        return view('perfil.create', ['usuarios' => $usersDisponiveis]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'usuario' => 'required|exists:usuarios,id'
        ]);

        $perfil = new Perfil();

        $perfil->descricao = $request->input('descricao');
        $perfil->usuario_idusuario = $request->input('usuario');

        try {
            $perfil->save();
        } catch (QueryException $qe) {
            return redirect()->route('perfil.create')->with('toast', ['type' => 'danger', 'message' => 'Erro ao salvar perfil: ' . $qe->getMessage()]);
        } catch (\Exception $e) {
            return redirect()->route('perfil.create')->with('toast', ['type' => 'danger', 'message' => 'Erro inesperado: ' . $e->getMessage()]);
        }

        return redirect()->route('perfil.index')->with('toast', ['type' => 'success', 'message' => 'Perfil criado com sucesso.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $perfil = Perfil::findOrFail($id);
        } catch (\Exception $e) {
            return redirect()->route('perfil.index')->with('toast', ['type' => 'danger', 'message' => 'Erro ao carregar perfil: ' . $e->getMessage()]);
        }

        return view('perfil.show', ['perfilSelecionado' => $perfil]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            // Carrega o perfil atual
            $perfil = Perfil::findOrFail($id);
            
            // Carrega os usuários disponíveis, incluindo o usuário atual do perfil
            $usersDisponiveis = Usuario::leftJoin('perfils', 'usuarios.id', '=', 'perfils.usuario_idusuario')
                ->whereNull('perfils.usuario_idusuario')
                ->orWhere('usuarios.id', $perfil->usuario_idusuario)  // Inclui o usuário atual associado ao perfil
                ->select('usuarios.*')
                ->get();
        } catch (\Exception $e) {
            return redirect()->route('perfil.index')->with('toast', ['type' => 'danger', 'message' => 'Erro ao carregar dados: ' . $e->getMessage()]);
        }
    
        return view('perfil.edit', ['perfilSelecionado' => $perfil, 'usuarios' => $usersDisponiveis]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'descricao' => 'required|string|max:255'
        ]);

        try {
            $perfil = Perfil::findOrFail($id);
            $perfil->descricao = $request->input('descricao');
            $perfil->usuario_idusuario = $request->input('usuario');
            $perfil->save();
        } catch (QueryException $qe) {
            return redirect()->route('perfil.edit', $id)->with('toast', ['type' => 'danger', 'message' => 'Erro ao atualizar perfil: ' . $qe->getMessage()]);
        } catch (\Exception $e) {
            return redirect()->route('perfil.edit', $id)->with('toast', ['type' => 'danger', 'message' => 'Erro inesperado: ' . $e->getMessage()]);
        }

        return redirect()->route('perfil.index')->with('toast', ['type' => 'success', 'message' => 'Perfil atualizado com sucesso.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perfil $perfil)
    {
        try {
            $perfil->delete();
        } catch (QueryException $qe) {
            if ($qe->errorInfo[1] == 1451) {
                return redirect()->route('perfil.index')->with('toast', ['type' => 'warning', 'message' => 'Não é possível excluir itens com vínculos.']);
            } else {
                return redirect()->route('perfil.index')->with('toast', ['type' => 'danger', 'message' => 'Erro ao excluir perfil: ' . $qe->getMessage()]);
            }
        } catch (\Exception $e) {
            return redirect()->route('perfil.index')->with('toast', ['type' => 'danger', 'message' => 'Erro inesperado: ' . $e->getMessage()]);
        }

        return redirect()->route('perfil.index')->with('toast', ['type' => 'success', 'message' => 'Perfil deletado com sucesso.']);
    }
}
