<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;
use App\Models\Aluno;

class Aula04Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $info = json_decode(file_get_contents('info.json'));
        $info = Aluno::all(); 
        return view('teste.index', ["info"=>$info]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teste.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           
        $aluno = new Aluno();

        $aluno->nome = $request->input('nome');
        $aluno->email = $request->input('email');

        try {
           $aluno->save();
       } catch (\Exception $e) {
        
       }

        return redirect()->route('aula4.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $especif = Aluno::find($id);

        return view('teste.show', ["especif"=>$especif]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $espe = Aluno::find($id);

        return view('teste.edit', ["item"=>$espe]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $aluno = Aluno::find($id);

       $aluno->nome = $request->input('nome');
       $aluno->email = $request->input('email');

       try {
           $aluno->save();
       } catch (\Exception $e) {

       }


        return redirect()->route('aula4.index');
    }

    public function valor(Request $request)
    {
        dd($request->valor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
        $aluno = Aluno::find($id);
        $aluno->delete();
        return redirect()->route('aula4.index');
}
}
