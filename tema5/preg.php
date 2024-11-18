<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--
    \d digito
    \s espacio en blanco
    \w caracter alfanumerico
    + uno o mas
    * cero o mas
    ^ comienza con
    $ termina con
    [] DEFINE CONJUNTO CARACTERES
    (?=.*) expresion busqueda anticipada positiva que verifica
    que la condicion dentro de los parentesis este en algun lugar de la cadena
    -->
    <php?
    / \d /
    $cadena = "abs1234";
    if(preg_match("/\d+/", $cadena)){
        echo "la cadena contiene numeros";
    }
    ?>
    
</body>
</html>