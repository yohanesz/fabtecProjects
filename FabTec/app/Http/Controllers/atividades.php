<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class atividades extends Controller
{
    public function salario($dias, $diaria){
        if ($dias < 0 || $diaria < 0)
            return ('Valores de dias/diaria nao podem ser negativos');
        else
            return ("O salario sera R$" . $dias*$diaria);
    }

    public function temperatura($valor, $tipo) {

        if ($tipo === 'c') {
            $fahrenheit = ($valor * 9/5) + 32;
            echo "celsius: ".$valor.' ºC'.'</br>'.'fahrenheit: '.$fahrenheit." ºF";
        } else if ($tipo === 'f') {
            $celsius = ($valor - 32) * 5/9;
            echo "fahrenheit: ".$valor.'ºF'."</br>".'celsius: '.$celsius." ºC";
        }
    }

    public function redirectIFC() {
        return redirect()->away('https://www.ifc-riodosul.edu.br');
    }

    public function redirectFabTec() {
        return redirect()->away('http://fabricadetecnologias.ifc-riodosul.edu.br/');
    }

    public function laravelRoute()
    {
        echo 'route';
    }

    public function laravelDatabase()
    {
        echo 'database';
    }

    public function laravelPublic()
    {
        echo 'public';
    }

    public function phpIf()
    {
        echo 'if';
    }

    public function phpFor()
    {
        echo 'for';
    }

    public function phpWhile()
    {
        echo 'while';
    }

    public function maiorNumero($firstNumber, $secondNumber) {
        if ($firstNumber == $secondNumber) {
            echo "Both numbers are equals";
        } else if($firstNumber > $secondNumber) {
            echo "the biggest number is ". $firstNumber;
    
        } else {
            echo "the biggest number is ". $secondNumber;
        }
    }

    public function pesoIdeal($altura, $peso, $sexo) {
        $pesoIdeal = 0;

        if(strtoupper($sexo) == "M") {
            $pesoIdeal = ((72.7 * $altura) - 58);
        } else if(strtoupper($sexo) == "F") {
            $pesoIdeal = ((62.1* $altura) - 44.7);
        }
    
        if($pesoIdeal < $peso) {
            echo "Você está acima do peso ideal";
        } else if($pesoIdeal > $peso) {
            echo "Você está abaixo do peso ideal";
        } else {
            echo "Você está no peso ideal";
        }
    
        echo "</br>". "Altura: ".$altura."</br>"."Peso: ".$peso."</br>"."Sexo: ".$sexo."</br>"."Peso Ideal:".$pesoIdeal;
    }

    public function caixaEletronico($valor) {
        $notas = [100,50,10,5,1];
        $numDeNotas = [];
    
        foreach ($notas as $nota) {
            $numDeNotas[$nota] = intdiv($valor, $nota);
            $valor %= $nota;
        }
    
        $resultado = [];
        foreach ($numDeNotas as $nota => $quantidade) {
            if ($quantidade > 0) {
                $resultado[] = "Nota de R$ $nota: $quantidade";
            }
        }
    
        foreach ($resultado as $result) {
            echo $result."</br>";
        }
    }

    public function fibonacci($n) {
        $fibonacci = [0, 1];
        $maxValue = 2584;
    
        while (true) {
            $nextValue = $fibonacci[count($fibonacci) - 1] + $fibonacci[count($fibonacci) - 2];
            if ($nextValue > $maxValue) {
                break;
            }
            $fibonacci[] = $nextValue;
        }
    
        foreach ($fibonacci as $number) {
            echo $number. " ";
        }
    }

    public function imprimirNumeros($n) {
        $numeros = range(1, $n);
    $soma = array_sum($numeros);
    $media = $soma / $n;

    $numerosString = implode(', ', $numeros);
    echo "Números: " . $numerosString . "<br>" . "Soma: " . $soma . "<br>" . "Média: " . $media;
    }

    public function tabuada($numero) {
        if (!is_numeric($numero) || intval($numero) != $numero) {
            return response('O valor informado deve ser um número inteiro.', 400);
        }

        $tabuada = '';
        for ($i = 0; $i <= 10; $i++) {
            $resultado = $numero * $i;
            $tabuada .= "$numero x $i = $resultado<br>";
        }

        return $tabuada;
    }
    







}
