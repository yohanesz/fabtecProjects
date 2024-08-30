<?php

namespace App\Http\Controllers;

use App\Models\Funcao;
use Illuminate\Http\Request;

class FuncaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $filtro = request()->input('filtro');
        $funcao = Funcao::where('descricao', "LIKE", $filtro.'%')->paginate(12);

        return view('funcao.index', ['info'=>$funcao])->with('filtro', $filtro);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('funcao.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $funcao = new Funcao();

        $funcao->descricao = $request->input('descricao');

        try {
            $funcao->save();
        } catch (\Exception $e) {
        }

        return redirect()->route('funcao.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $funcao = Funcao::find($id);
        $usuario = $funcao->usuario()->get();

        if ($usuario == null) {
            $usuario = collect(); 
        }
        return view('funcao.show', ['funcao' => $funcao, 'usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $funcao = Funcao::find($id);

        return view('funcao.edit', ['funcao' => $funcao]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $funcao = Funcao::find($id);

        $funcao->descricao = $request->input('descricao');
        try {
            $funcao->save();
        } catch (\Exception $e) {
        }

        return redirect()->route('funcao.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $funcao = Funcao::find($id);
        $funcao->delete();

        return redirect()->route('funcao.index');
    }
}
