<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>isset()</h2>true IF{Definida $$ NO NULL}
    <h2>empty()</h2>true IF{NO Definida || NULL || 0 || ""}
</body>
</html>

<?php
    //isset y empty = true

    $valor = 0;
    echo("<br>");
    if (isset($valor)) {
        echo("variable de \$valor esta definido");
    } else {
        echo("variable de \$valor no esta definido");
    }

    echo("<br>");
    if (empty($valor)) {
        echo("variable de \$valor esta vacio");
    } else {
        echo("variable de \$valor no esta vacio");
    }
    
    //elemina TODA la variable
    unset($valor);
    echo("<br>");
    //isset false, empty true
    if (isset($valor)) {
        echo("variable de \$valor esta definido");
    } else {
        echo("variable de \$valor no esta definido");
    }

    echo("<br>");
    if (empty($valor)) {
        echo("variable de \$valor esta vacio");
    } else {
        echo("variable de \$valor no esta vacio");
    }

    $valor = "juan";
    echo("<br>");
    //isset true, empty false
    if (isset($valor)) {
        echo("variable de \$valor esta definido");
    } else {
        echo("variable de \$valor no esta definido");
    }

    echo("<br>");
    if (empty($valor)) {
        echo("variable de \$valor esta vacio");
    } else {
        echo("variable de \$valor no esta vacio");
    }

    //isset false, empty true
    $valor = null;
    echo("<br>");

    if (isset($valor)) {
        echo("variable de \$valor esta definido");
    } else {
        echo("variable de \$valor no esta definido");
    }

    echo("<br>");
    if (empty($valor)) {
        echo("variable de \$valor esta vacio");
    } else {
        echo("variable de \$valor no esta vacio");
    }

    //isset false, empty true
    $valor = [0,null,[],"0"];
    echo("<br>");
    echo("<br>");
    echo("<br>");
    echo("valor: ".var_export($valor,true));
    foreach ($valor as $key) {
        echo("<br>");
        if (isset($key)) {
            echo("variable de \$valor esta definido");
        } else {
            echo("variable de \$valor no esta definido");
        }
    
        echo("<br>");
        if (empty($key)) {
            echo("variable de \$valor esta vacio");
        } else {
            echo("variable de \$valor no esta vacio");
        }
    }

    //array elemento vacio
    $valor = ["si" => 5, "no" => 10];
    echo("<br>");

    if (isset($valor["puede"])) {
        echo("variable de \$valor esta definido");
    } else {
        echo("variable de \$valor no esta definido");
    }

    echo("<br>");
    if (empty($valor[3])) {
        echo("variable de \$valor esta vacio");
    } else {
        echo("variable de \$valor no esta vacio");
    }

    echo("<br>");

    //trim()
    $valor= "hola mundo";
    echo(trim($valor)."<br>");
    $valor= "      hola mundo";
    echo(trim($valor)."<br>");
    $valor= "hola mundo      ";
    echo(trim($valor)."<br>");
    //meter en pre
    $valor= "     hola        mundo       ";
    echo(trim($valor)."<br>");


?>