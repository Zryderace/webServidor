<?php $usuario = "Ale"; ?>

<html>
    <head>
        <title>arrays</title>
    </head>
    <body>
        <h1>Esto son cosas de arrays</h1>
        <?php echo $usuario . "<br>"; ?>

        <h1>Fundamentos</h1>
    
        <?php

            $impar = [1,3,5,7,9];
            print_r($impar);
            echo "<br>";
            $impar[20] = 11;
            array_push($impar,5858);
            print_r($impar);
            echo "<br>";
            #error echo $impar[5];
            echo sizeof($impar) . "<br>";
            echo "<br>" . count($impar) . " es el numero de elementos del array";

            echo "<br>";

            echo "funciones de arrays y dictionaries <br>";

            ksort($impar); #ordena menor a mayor por CLAVES numericas
            print_r($impar);
            echo "<br>";

            asort($impar); #ordena los valores del array manteniendo la asociacion con claves
            print_r($impar);
            echo "<br>";

            krsort($impar); #ordena mayor a menor por CLAVES
            print_r($impar);
            echo "<br>";
        ?>

        <h2>Funciones utiles para array</h2>

        <?php
            $pares = [2,4,6,8,10];
            print_r($pares);
            echo "<br>" . count($pares) . " es el numero de elementos del array";
            # cuenta
            echo "<br>";

            $primer_valor = reset($pares); #devuelve el primer del array y resetea el iteridar interno
            echo "$primer_valor <br>";

            $ultima_clave = count($pares)-1;
            echo $pares[$ultima_clave] . " este es el ultimo valor <br>";
        ?>

        <h2>Mas funciones</h2>

        <?php

        $bucle = [];

        for ($i=1; $i < 11; $i++) { 
            array_push($bucle,$i);
        }

        print_r($bucle);
        echo "<br>";

        array_pop($bucle); #elimina ultimo elementos, key value
        print_r($bucle);
        echo "<br>";

        array_unshift($bucle, 0);
        print_r($bucle);
        echo "<br>";

        array_shift($bucle);
        print_r($bucle);
        echo "<br>";

        $impares = [1,3,5,7,9];
        $pares = [2,4,6,8,10];

        $completo = array_merge($impares,$pares);
        asort($completo);
        print_r($completo);
        echo "<br>";

        unset($completo[0]);
        unset($completo[5]);
        unset($completo[1]);
        print_r($completo);
        echo "<br>";
        
        array_unshift($completo);
        print_r($completo);
        echo "<br>";
        ?>

        



    </body>
</html>

