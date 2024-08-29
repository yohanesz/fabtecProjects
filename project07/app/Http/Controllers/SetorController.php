<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class SetorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {

        $filtro = request()->input('filtro');



        $info = Setor::where('descricao', "LIKE", $filtro.'%')->paginate(12);

        return view('setor.index', ['info'=>$info])->with('filtro', $filtro);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('setor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $setor = new Setor();

        $setor->descricao = $request->input('descricao');

        try {
            $setor->save();
        } catch (\Exception $e) {
        }

        return redirect()->route('setor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $setorSelecionado = Setor::find($id);

        return view('setor.show', ['setorSelecionado'=>$setorSelecionado]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $setorSelecionado = Setor::find($id);

        return view('setor.edit', ['setorSelecionado'=>$setorSelecionado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $setorSelecionado = Setor::find($id);

        $setorSelecionado->descricao = $request->input('descricao');

        try {
            $setorSelecionado->save();
        } catch (\Exception $e) {
        }

        return redirect()->route('setor.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $setor = Setor::find($id);
        $setor->delete();
        return redirect()->route('setor.index');
    }
}
