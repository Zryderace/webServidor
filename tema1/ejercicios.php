<?php

/*
    ENUNCIADO EJERCICIOS
    
    1) Crea un script en PHP que muestre dos mensajes diferentes usando echo.
    

    2) Declara una variable con un valor de texto, luego cámbiala por un número. Usa la función correspondiente para mostrar el tipo de la variable en ambos casos.


    3) Declara dos variables de tipo entero, suma ambas y muestra el resultado en pantalla, el resultado debe tener el siguiente formato: "La suma de (primer numero) y (segundo numero) es: (resultado).


    4) Declara una variable de tipo float, realiza una operación de suma con un número entero, muestra el resultado y qué tipo de variable es el resultado de la suma.
    
    
    5) Crea una variable booleana con el valor true y otra con false. Muestra el valor de cada una y muestra el tipo de dato. Una vez hecho, modifica la variable false para que no muestre un espacio en blanco
    pero la variable siga valiendo false. 
    
    
    6) Define una constante y muestra su valor usando echo.´
    
    
    7) Crea un array con tres valroes de tipo string, int y boolean. A continuación mostrar cada valor de manera individual, el tipo de dato que es y por último mostrar el tipo de la lista al completo.
    
    
    8) Crea un array vacío y luego añade tres valores utilizando la función correspondiente, muestra el array COMPLETO, no cada valor de manera individual.
    
    
    9) Crea un array asociativo con tres claves: "nombre", "edad" y "pais". A continuación muestra los valores haciendo uso de las claves.
    
    
    10) Crea un array con valores duplicados, usa la función correspondiente para eliminar los duplicados y así conseguir un "set". Muestra el set resultante.
*/
//1
$cadena1 = "hola";
$cadena2 = "mundo";

echo "$cadena1 $cadena2 <br>";

//2

$cadena3 = "text";
echo gettype($cadena3) . "<br>";
$cadena3 = 4;
echo gettype($cadena3) . "<br>";

//3

$numero1 = 5;
$numero2 = 4;

echo "La suma de $numero1 y $numero2 es: " . $numero1 + $numero2 . "<br>";

//4

$numero3 = 1.2;
$numero3 = $numero3 + $numero2;
echo gettype($numero3) . "<br>";

//5

$verd = true;
$ment = false;

echo $verd . "<br>";
echo $ment . "<br>";
echo gettype($verd) . "<br>";
echo gettype($ment) . "<br>";

$ment = 0;
echo $ment . "<br>";

//6

const HOLA = "HOLA";
echo HOLA . "<br>";

//7

$array = ["string" , 5 , true];
echo $array[0] . "<br>";
echo gettype($array[0]) . "<br>";
echo $array[1] . "<br>";
echo gettype($array[1]) . "<br>";
echo $array[2] . "<br>";
echo gettype($array[2]) . "<br>";

echo gettype($array) . "<br>";

//8

$vacio = [];

array_push($vacio, "hola", $vacio, "que", $vacio, "tal");
print_r($vacio);
echo "<br>";

//9

$dictionary = array("nombre" => "alex", "edad" => 24, "pais" => "españita");

echo $dictionary["nombre"] . "<br>";
echo $dictionary["edad"] . "<br>";
echo $dictionary['pais'] . "<br>";

//10

$repetido = ["perro", "perro", "perro"];

$perro = array_unique($repetido);

print_r($perro);
