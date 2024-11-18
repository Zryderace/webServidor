<?php

    //comentario
    /*
    comentario
    */

use PSpell\Dictionary;

    echo "esto es un comentario String<br>";
    //echo 3;

    $cadena = "hola me encanta PHP" . "<br>";
    echo $cadena;
    echo gettype($cadena) . "<br>";
    $cadena = 11;
    echo gettype($cadena)  . "<br>";
    $numero1 = 10;
    $numero2 = 5.5;
    echo gettype($numero2) . "<br>";
    echo $numero1 + $numero2 . "<br>";
    echo $numero1 . $numero2 . "<br>";
    echo $numero1 / $numero2 . "<br>";
    echo $numero1 * $numero2 . "<br>";
    echo $numero1 % $numero2 . "<br>";

    $numero3 = $numero1 + $numero2;
    echo $numero3 . "<br>";

    $booleano = true;
    echo $booleano . "<br>";

    $cadena2 = "PHP";
    echo "estamos aprendiendo $cadena2 y el boolean es $booleano" . "<br>";

    //CONSTANTES

    const MI_CONSTANTE = "el valor de la constante es esta";

    echo MI_CONSTANTE . "<br>";

    //LISTAS ARRAYS

    $cadena = "hola";
    $numero = 5;
    $bool = true;
    $miArray = [$cadena, $numero, $bool];

    echo $miArray[0] . "<br>";

    array_push($miArray, "PHP");

    echo $miArray[3] . "<br>";

    print_r($miArray);
    echo "<br>";

    //hashmap

    $dictionary = array("string" => $cadena, "int" => $numero, "bool" => $bool);

    print_r($dictionary);
    echo "<br>";

    echo $dictionary["string"] . "<br>";
    echo $dictionary["int"] . "<br>";
    echo $dictionary["bool"] . "<br>";

    $dictionary["apellido"] = "Rodriguez";
    //meter nueva clave valor
    echo $dictionary["apellido"] . "<br>";
    //cambiar valor con la misma key
    $dictionary["string"] = "juanito";

    echo $dictionary["string"] . "<br>";

    //SET

     array_push($miArray, "medac");
     array_push($miArray, "medac");

     print_r($miArray);

     echo "<br>";
    //elimina repetidos solo en pantalla
     print_r(array_unique($miArray));

    https://demo.firepad.io/#qQFLfctLhj

    //FOR

    $lista = [];

    for ($i=0; $i < 10; $i++) { 
        array_push($lista, $i);
    }

    echo "<br>";

    print_r($lista);

    echo "<br>";

    foreach ($lista as $aux) {
        echo $aux;
    }

    do {
        # code...
    } while ($a <= 10);

    while ($a <= 10) {
        # code...
    }

    


?>
