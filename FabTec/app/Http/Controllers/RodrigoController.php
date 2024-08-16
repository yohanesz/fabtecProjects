<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RodrigoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $info = json_decode(file_get_contents('info.json'));
        
        if($info == null) {
            $info = [];
        }
       
        return view('index', ["info"=>$info]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if(file_exists('info.json'))
        $info = json_decode(file_get_contents('info.json'));
                        
        else 
        $info = [];

            $idsList = array_column($info, 'id');
            if($idsList){
                $auto_increment_id = max($idsList) + 1;
            }else{
                $auto_increment_id = 0;
            }

            $req = ['id' => $auto_increment_id, 
                    'nome' => $request->nome, 
                    'email' => $request->email
            ];


            array_push($info, $req);


        encodar($info);
        return redirect()->route('aula4.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $info = json_decode(file_get_contents('info.json'));
        $especif = [];

        foreach($info as $item) {
            if($item->id == $id) {
                $especif = $item;
                break;
            }
        }

        return view('show', ["especif" => $especif]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) //apenas mostra o formulario, quem edita de verdade é o update
    {
        $info = json_decode(file_get_contents('info.json'));
        $espec = [];

        foreach($info as $item) {
            if($item->id == $id) {
                $espec = $item;
                break;
            }
        }

        return view('edit', ['item' => $espec]);
    }

   
    public function update(Request $request, string $id)
    {
        $info = json_decode(file_get_contents('info.json'));

        for($i = 0; $i < count($info); $i++) {
            if($info[$i]-> id == $id) {

                if($request->nome) {
                    $nome = $request->nome;
                } else {
                    $nome = 0;
                }

                if($request->email) {
                    $email = $request->email;
                } else {
                    $email = 0;
                }

                $info[$i] = ["id" => $id, "nome" => $request->nome, "email" => $request->email];
            }
        }

        encodar($info);

        return redirect()->route('aula4.index');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function valor(Request $request)
    {
        dd($request->valor);
    }

    public function destroy(Request $request,string $id)
    {
         $info = json_decode(file_get_contents('info.json'));
         $new_info = [];

         foreach($info as $key => $k)
             if($k->id != $id)
                 array_push($new_info, $k);

         encodar($new_info);
        return redirect()->route('aula4.index');
}

    
}

function encodar($dados){
    $json = json_encode($dados);

    $file = fopen('info.json', 'w');

    fwrite($file, $json);
    fclose($file);
}