<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="arrayDobles.php" method="POST">
        <input type="hidden" name="form" value="ej1" />
        Palabra: <input required type="text" min="1" name="palabra" id="palabra" />
        <input type="submit" value="Enviar" />
    </form>
    <br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {

        $id = $_POST['form'];

        if ($id == 'ej1') {
        }
    }
    ?>

    <?php
    $array0 = array(array(), array(), array());
    $array0 = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
    for ($i = 0; $i < count($array0); $i++) {
        for ($j = 0; $j < count($array0[$i]); $j++) {
            echo ($array0[$i][$j]);
        }
    }

    $alumnos = [
        "alumno1" => ["nombre" => "Wen", "edad" => 21],
        "alumno2" => ["nombre" => "Daniela", "edad" => 32],
        "alumno3" => ["nombre" => "David", "edad" => 14]
    ];

    echo $alumnos['alumno1']['nombre'];

    foreach ($alumnos as $alumno) {
        echo ($alumno['nombre']);
    }

    $array = [];

    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
            $array[$i][$j] = ($i + 1) * ($j + 1);
        }
    }

    // echo "<pre>";
    // print_r($array);
    // echo "</pre>";

    for ($i = 0; $i < 10; $i++) {

        for ($j = 0; $j < 10; $j++) {
            echo ("|| ");
            echo $array[$i][$j] = ($i + 1) + ($j + 1);

            if ($j == 9) {
                echo (" ||");
            } else {
                echo (" ||---");
            }
        }
        echo ("<br>");
    }

    // echo "<pre>";
    // print_r($array);
    // echo "</pre>";

    //         <h1>Suma elementos</h1>
    //     Crea un array bidimensional de 4x4 que contenga números enteros. Escribe un programa que muestre el array con el separador "-" entre cada elemento del array y calcule la suma de todos sus elementos.
    $array = [];
    $suma = 0;
    for ($i = 0; $i < 4; $i++) {
        for ($j=0; $j < 4; $j++) { 
            $array[$i][$j] = rand(1,100);
            $suma += $array[$i][$j];
            echo($array[$i][$j]."-");
        }
    }
    echo($suma."<br>");
    //  <h1>Matriz identidad</h1>
    //     Crea una matriz identidad de 4x4. Una matriz identidad tiene 1 en la diagonal principal y 0 en el resto de puestos de la matriz. Muestra la matriz resultante con bucles.
    $array = [];
    for ($i = 0; $i < 4; $i++) {
        for ($j=0; $j < 4; $j++) { 
            if ($i==$j) {
                $array[$i][$j] = 1;
            } else {
                $array[$i][$j] = 0;
            }
            echo($array[$i][$j]);
        }
        echo("<br>");
    }
    echo "<br>";
    // <h1>Transpuesta de una matriz</h1>
    //     Dada una matriz 3x3, escribe un programa que calcule y muestre su respuesta. La transpuesta de una matriz es otra matriz en la que las filas son las columnas y viceversa.
    $array = [];
    $arrayRes = [];

    for ($i=0; $i < 3; $i++) { 
        for ($j=0; $j < 3; $j++) { 
            $array[$i][$j] = rand(1,100);
        }
    }
    echo "<br>";
    // <h1>Multiplicación de matrices</h1>
    //     Crea dos matrices bidimensionales de 2x2 con números enteros. Escribe un programa que calcule el producto de dos matrices y muestre el resultado.
    //     En una multiplicación de matrices, el número de columnas de la primera matriz debe coincidir con el número de filas de la segunda matriz.
    //     Para multiplicar dos matrices de 2x2, el resultado también será una matriz de 2x2.
    //         <pre>
    //     Ejemplo:
    //     Dadas dos matrices A y B:  A: a11 a12  y  B: b11 b12
    //                                   a21 a22        b21 b22

    //     La multiplicación de A x B se calcularía tal que así:

    //     Resultado = [ (a11*b11 + a12*b21) (a11*b12 + a12*b22) ]
    //                 [ (a21*b11 + a22*b21) (a21*b12 + a22*b22) ]

    //     Ejemplo con números:
    //     Matriz A:
    //                 1 2
    //                 3 4

    //     Matriz B:
    //                 5 6
    //                 7 8

    //     Resultado de A x B:
    //                 19 22
    //                 43 50
    //     </pre>
    
    //     <h1>Media de una matriz</h1>
    //     Escribe un programa que calcule la media de todos los valores de una matriz bidimensional de 4x3 (4 filas y 3 columnas). Después muestra la media.

    ?>

</body>

</html>