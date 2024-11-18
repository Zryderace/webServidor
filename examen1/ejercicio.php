<?php

function esPrimo($numero){
    for ($i=2; $i <= $numero/2; $i++) { 
        if ($numero%$i==0) {
            return false;
        }
    }
    return true;
}

function generarFloyd($filas){
    $array = [];
    $array[0][0] = 1;
    $aumentando = 2;
        for ($i=1; $i < $filas; $i++) { 
            for ($j=0; $j <= $i; $j++) {
                do {
                    if (esPrimo($aumentando)) {
                        $array[$i][$j] = $aumentando;
                        break;
                    }
                    $aumentando++;
                } while (true);
                $aumentando++;
            }
        }
    return $array;
}

function matrizTranspuesta($array){

    $arrayTrans = [];

    return $arrayTrans;
}

function multMatrices($array1,$array2){
    
    $arrayMult = [];

    return $arrayMult;
}

function determinanteMatriz($array){

    $arrayDet = [];

    return $arrayDet;
}

function imprimirArray($array){
    for ($i=0; $i < count($array); $i++) { 
        for ($j=0; $j < count($array[$i]); $j++) { 
            echo($array[$i][$j] . " ");
        }
        echo "<br>";
    }
}

function esPerfecto($num){
    #es perfecto si la suma de sus %==0 es el propio numero EJ: 1+2+3=6
    $sumatorio = 0;
    for ($i=1; $i <= $num/2; $i++) { 
        if ($num%$i==0) {
            $sumatorio += $i;
        }
    }
    if ($num==$sumatorio) {
        return true;
    } else {
        return false;
    }
}

function arrayAleatorio($filas, $columnas){
    $array = [];
    for ($i=0; $i < $filas; $i++) { 
        for ($j=0; $j < $columnas; $j++) { 
            $array[$i][$j] = rand(1,10);
        }
    }
    return $array;
}

function sumaArrays($arr1,$arr2){
    #devulve bidimensional
    $resultado = [];
    for ($i=0; $i < count($arr1); $i++) { 
        for ($j=0; $j < count($arr1[$i]); $j++) { 
            $resultado[$i][$j]= $arr1[$i][$j] + $arr2[$i][$j];
        }
    }
    return $resultado;
}

function restaArrays($arr1,$arr2){
    #devulve bidimensional
    $resultado = [];
    for ($i=0; $i < count($arr1); $i++) { 
        for ($j=0; $j < count($arr1[$i]); $j++) { 
            $resultado[$i][$j]= $arr1[$i][$j] - $arr2[$i][$j];
        }
    }
    return $resultado;
}

function imprimirArrays($arr){
    echo("<table>");
    for ($i=0; $i < count($arr); $i++) { 
        echo("<tr>");
        for ($j=0; $j < count($arr[$i]); $j++) { 
            $posicion = $arr[$i][$j];
            echo("<td style='border: solid 2px blue'>$posicion</td>");
        }
        echo("</tr>");
    }
    echo("</table><br>");
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $id = $_POST['form'];


    if ($id == 'ej1') {
        $alumnos = [
            "Juanito" => ["sistemas" => 9, "lenguajeMarcas" => 5, "BBDD" => 7],
            "Rosa" => ["sistemas" => 6, "lenguajeMarcas" => 9, "BBDD" => 9],
            "Hector" => ["sistemas" => 4, "lenguajeMarcas" => 8, "BBDD" => 7],
            "Florencia" => ["sistemas" => 6, "lenguajeMarcas" => 10, "BBDD" => 8],
            "Eugenio" => ["sistemas" => 9, "lenguajeMarcas" => 5, "BBDD" => 6]
        ];

        foreach ($alumnos as $alumno => $nombre) {
            $media = 0;
            $contAsignaturas = 0;
            foreach ($nombre as $asignatura) {
                $media += $asignatura;
                $contAsignaturas++;
            }
            $media /= $contAsignaturas;
            echo("La media de $alumno es $media <br>");
        }
    }

    
    if ($id == 'ej2') {
        $inferior = $_POST['inferior'];
        $superior = $_POST['superior'];

        if ($inferior>$superior) {
            $temp = $superior;
            $superior = $inferior;
            $inferior = $temp;
        }

        $i = $inferior;
        echo("Numeros perfectos en el rango de $inferior a $superior: <br>");

        while ($i <= $superior) {
            if (esPerfecto($i)) {
                echo("$i es un numero perfecto. <br>");
            }
            $i++;
        }

    }

    if ($id == 'ej3') {
        
        $filas = $_POST['filas'];
        $array = [];

        for ($i=0; $i <= $filas; $i++) { 
            for ($j=0; $j < $i; $j++) {
                if ($j==0||$j==$i-1) {
                    $array[$i][$j] = 1;
                } else {
                    $array[$i][$j] = $array[$i-1][$j] + $array[$i-1][$j-1];
                }
            }
        }

        echo "<pre>";
        print_r($array);
        echo "</pre>";
        $array2 = [];

        for ($i=$filas-1; $i >= 0; $i--) { 
            for ($j=$filas-1; $j > $i; $j--) {
                if ($j==0||$j==$i) {
                    $array2[$i][$j] = 1;
                } else {
                    $array2[$i][$j] = $array2[$i+1][$j] + $array2[$i+1][$j+1];
                }
            }
        }

        echo "<pre>";
        print_r($array2);
        echo "</pre>";
        
    }

    if ($id == 'ej4') {
        #tamaño 4
        /**
         * 1
         * 23
         * 456
         * 78910
         * 
         * 1
         * 23
         * 5711
         * 13171923
         */
        $numero = $_POST['numero'];
        $array = generarFloyd($numero);
        imprimirArray($array);
        // echo "<pre>";
        // print_r($array);
        // echo "</pre>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == 'GET') {

    $id = $_GET['form'];

    if ($id == 'ej1') {
        
        $action = $_GET['action'];
        $array1 = arrayAleatorio(3,3);
        $array2 = arrayAleatorio(3,3);
        $arrayFinal = "";
        if ($action!='suma'&&$action!='resta') {
            echo("escribe suma o resta");
        } else if ($action=='suma') {
            $arrayFinal = sumaArrays($array1,$array2);
        } else {
            $arrayFinal = restaArrays($array1,$array2);
        }

        echo "<pre>";
        print_r($arrayFinal);
        echo "</pre>";
    }

    if ($id == 'ej2') {
        
        $action = $_GET['action'];
        $array1 = arrayAleatorio(3,3);
        $array2 = arrayAleatorio(3,3);
        $arrayFinal = "";
        if ($action!='suma'&&$action!='resta') {
            echo("escribe suma o resta");
        } else if ($action=='suma') {
            $arrayFinal = sumaArrays($array1,$array2);
        } else {
            $arrayFinal = restaArrays($array1,$array2);
        }

        echo("Array 1<br>");
        imprimirArrays($array1);
        echo("Array 2");
        imprimirArrays($array2);
        echo("Array Final");
        imprimirArrays($arrayFinal);
        

        
    }
}

?>