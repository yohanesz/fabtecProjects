<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\atividades;
use App\Http\Controllers\RodrigoController;

Route::get('/', function() {
    return redirect('/aula4');
});

Route::resource('aula4', RodrigoController::class);



// Route::get('/salario/{dias}/{diaria}', [atividades::class, 'salario']);
// Route::get('/temperatura/{valor}/{tipo}', [atividades::class, 'temperatura']);


// Route::get('/redirect-ifc', [atividades::class, 'redirectIFC']);
// Route::get('/redirect-fabtec', [atividades::class, 'redirectFabTec']);


// Route::prefix('laravel')->group(function () {
//     Route::get('/route', [atividades::class, 'laravelRoute']);
//     Route::get('/database', [atividades::class, 'laravelDatabase']);
//     Route::get('/public', [atividades::class, 'laravelPublic']);
// });

// Route::prefix('php')->group(function () {
//     Route::get('/if', [atividades::class, 'phpIf']);
//     Route::get('/for', [atividades::class, 'phpFor']);
//     Route::get('/while', [atividades::class, 'phpWhile']);
// });

// // Rota para maior número
// Route::get('/maior-numero/{firstNumber}/{secondNumber}', [atividades::class, 'maiorNumero']);

// Route::get('/peso-ideal/{altura}/{peso}/{sexo}', [atividades::class, 'pesoIdeal']);

// Route::get('/caixa-eletronico/{valor}', [atividades::class, 'caixaEletronico']);

// Route::get('/fibonacci/{n}', [atividades::class, 'fibonacci']);

// Route::get('/imprimir-numeros/{n}', [atividades::class, 'imprimirNumeros']);

// Route::get('/tabuada/{numero}', [atividades::class, 'tabuada']);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return ('return teste');
// });

// Route::get('/yohanes', function () {
//     return view('yohanes');
// });


// Route::get('/tab/{valor?}', function ($valor = 0) {
//     for($i = 0; $i <= 10; $i++) {
//         echo $valor." x ".$i." = ".($valor*$i)."<br>";
//     }
// });

// //parâmetro com validação
// Route::get('/teste/{letra}/{numero}',function ($letra,$numero) {
//     return "route: ".$letra."/".$numero;
// })->where("letra","[a-z]+")->where("numero","[0-9]+");


// Route::get('/route1', function () {
//     return ('route1 using redirect');
// });

// Route::get('/novarota', function () {
//     return redirect('/route1');
// });

// //---BLOQUEIO PELO MIDDLEWARE-----//

// Route::get('/um', function () {
//     return redirect()->route('dois');
// }) ->name('um');

// Route::get('/dois', function () {
//     return redirect()->route('um');
// }) ->name('dois');

// // Atividades

// Route::get('/fibonacci', function() {
//     $fibonacci = array(0,1,1); 
//     $limit = 2584;

   
//     while (true) {
//         $next = $fibonacci[count($fibonacci) - 1] + $fibonacci[count($fibonacci) - 2];
//         if ($next > $limit) {
//             break; 
//         }
//         $fibonacci[] = $next; 
//     }

//     foreach ($fibonacci as $n) {
//         echo '['.$n.'] ';
//     }
// });


// Route::get('/salario/{dias}/{diaria}', function ($dias, $diaria) {

//     $salario = $dias * $diaria;

//     if($salario < 0) {
//         echo "Valores de dias/diaria não podem ser negativos";
//     } else {
//         echo "salário total: R$".$salario."</br>". "dias trabalhados: " .$dias."</br>"."diária: R$" . $diaria;
//     }
// });

// Route::get('/temperatura/{valor}/{tipo}', function ($valor, $tipo) {


//     if ($tipo === 'c') {
//         $fahrenheit = ($valor * 9/5) + 32;
//         echo "celsius: ".$valor.' ºC'.'</br>'.'fahrenheit: '.$fahrenheit." ºF";
//     } else if ($tipo === 'f') {
//         $celsius = ($valor - 32) * 5/9;
//         echo "fahrenheit: ".$valor.'ºF'."</br>".'celsius: '.$celsius." ºC";
//     }
// }) -> where("tipo", "[c|f]");

// //away usado para redirecionar para rotas externas
// Route::get('/ifc', function () {
//     return redirect()->away('https://www.ifc-riodosul.edu.br');
// });

// Route::get('/fabtec', function () {
//     return redirect()->away('http://fabricadetecnologias.ifc-riodosul.edu.br/');
// })->name('fabtec');

// Route::get('/fabrica', function () {
//     return redirect()->route('fabtec');
// });

// Route::prefix('/laravel')->group(function () {
    
//     Route::get('/', function () {
//         echo "/laravel";
//     });

//     Route::prefix('/route')->group(function () {
//         Route::get('/', function () {
//             echo "/laravel/route";
//         });
//     });

//     Route::prefix('/database')->group(function () {
//         Route::get('/', function () {
//             echo "/laravel/database";
//         });
//     });

//     Route::prefix('/public/php')->group(function () {
//         Route::get('/', function () {
//             echo "/laravel/public/php";
//         });

//         Route::prefix('/if')->group(function () {
//             Route::get('/', function () {
//                 echo "/laravel/public/php/if";
//             });
//         });

//         Route::prefix('/for')->group(function () {
//             Route::get('/', function () {
//                 echo "/laravel/public/php/for";
//             });
//         });

//         Route::prefix('/while')->group(function () {
//             Route::get('/', function () {
//                 echo "/laravel/public/php/while";
//             });
//         });
//     });
// });

// Route::get("/testeRota", function() {
//     return('get');
// });

// Route::post("/testeRota", function() {
//     return('post');
// });

// Route::put("/testeRota", function() {
//     return('put');
// });

// Route::patch("/testeRota", function() {
//     return('patch');
// });

// Route::delete("/testeRota", function() {
//     return('delete');
// });

// //

// Route::get("/maiorNumero/{firstNumber}/{secondNumber}", function($firstNumber, $secondNumber) {

//     if ($firstNumber == $secondNumber) {
//         echo "Both numbers are equals";
//     } else if($firstNumber > $secondNumber) {
//         echo "the biggest number is ". $firstNumber;

//     } else {
//         echo "the biggest number is ". $secondNumber;
//     }

// });

// Route::get("pesoIdeal/{altura}/{peso}/{sexo}", function($altura, $peso, $sexo){

//     $pesoIdeal = 0;

//     if(strtoupper($sexo) == "M") {
//         $pesoIdeal = ((72.7 * $altura) - 58);
//     } else if(strtoupper($sexo) == "F") {
//         $pesoIdeal = ((62.1* $altura) - 44.7);
//     }

//     if($pesoIdeal < $peso) {
//         echo "Você está acima do peso ideal";
//     } else if($pesoIdeal > $peso) {
//         echo "Você está abaixo do peso ideal";
//     } else {
//         echo "Você está no peso ideal";
//     }

//     echo "</br>". "Altura: ".$altura."</br>"."Peso: ".$peso."</br>"."Sexo: ".$sexo."</br>"."Peso Ideal:".$pesoIdeal;

// });

// Route::get("caixaEletronico/{valorSaque}", function($valor) {

//     $notas = [100,50,10,5,1];
//     $numDeNotas = [];

//     foreach ($notas as $nota) {
//         $numDeNotas[$nota] = intdiv($valor, $nota);
//         $valor %= $nota;
//     }

//     $resultado = [];
//     foreach ($numDeNotas as $nota => $quantidade) {
//         if ($quantidade > 0) {
//             $resultado[] = "Nota de R$ $nota: $quantidade";
//         }
//     }

//     foreach ($resultado as $result) {
//         echo $result."</br>";
//     }
    
// });

// Route::get('/fibonacci', function() {
//     $fibonacci = [0, 1];
//     $maxValue = 2584;

//     while (true) {
//         $nextValue = $fibonacci[count($fibonacci) - 1] + $fibonacci[count($fibonacci) - 2];
//         if ($nextValue > $maxValue) {
//             break;
//         }
//         $fibonacci[] = $nextValue;
//     }

//     foreach ($fibonacci as $number) {
//         echo $number. " ";
//     }
// });

// Route::get("/ultima/{n}", function($n) {

//     $numeros = range(1, $n);
//     $soma = array_sum($numeros);
//     $media = $soma / $n;

//     $numerosString = implode(', ', $numeros);
//     echo "Números: " . $numerosString . "<br>" . "Soma: " . $soma . "<br>" . "Média: " . $media;

// });