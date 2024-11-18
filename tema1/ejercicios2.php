<html>

<head>
    <title>
        PHP Ejercicios
    </title>
</head>

<body>
    <h1>Bienvenidos al maravilloso mundo de los ejercicios de PHP</h1>

    <ol>
        <li> -Crea un array con cinco números. Utiliza un bucle para sumar todos los elementos del array y muestra el resultado de la suma</li>
        <li> -Crea un array de números del 1 al 5. Pide al usuario que introduzca un número (cread una variable $num_usuario) y comprueba si el numero esta en el array. Mostrar un mensaje según el resultado</li>
        <li> -Crea un array con números del 1 al 10, recorre el array y muestra sólo los impares</li>
        <li> -Crea un array de números desordenados y utiliza la función correspondiente para ordenarlos de forma ascendente. Muestra el array antes y después de ordenarlo</li>
        <li> -Crea un array con varios elementos y usa la función correspondiente para contar cuántos elementos tiene el array, muestra el resultado</li>
        <li> -Crea un array asociativo que contenga la información de una persona (nombre, apellido1 y edad). Muestra los valores USANDO LAS CLAVES</li>
        <li> -Crear un array de números desordenados, recorrer el array para encontrar el número más grande y el más pequeño, mostrarlos por pantalla</li>
        <li> -Crear un array vacío, llenarlo gracias a un bucle con números del 1 al 10, mostrar el array completo y a continuación crearme otro array con el orden de los valores invertidos, es decir, si el 1 estaba en la posicion 0 del array, ahora que este en la 9</li>
        <li> -Crear un array con los nombres de 10 videojuegos (si no se te ocurre pregunta al de al lado), usa un bucle para mostrar cada juego en una línea diferente</li>
        <li> Crea dos arrays, uno con numeros pares y otro con impares, usa la función correspondiente para combinar ambos arrays y después otra función para ordenarlos</li>
    </ol>

    <h2>Nota!!</h2>
    Hacedme el favor de separar cada ejercicio con etiquetas html, quiero una página ordenada y legible, en clase hemos visto cómo se hacía.

    <h2>Ejercicio 1</h2>

    <?php
    $numeros = [1, 2, 3, 4, 5];
    $suma = 0;
    for ($i = 0; $i < count($numeros); $i++) {
        $suma += $numeros[$i];
    }
    echo $suma . "<br>";
    $suma = 0;
    foreach ($numeros as $key) {
        $suma += $key;
    }
    echo $suma . "<br>";

    ?>
    <h2>Ejercicio 2</h2>
    
    <?php
        $num_usuario = 40;
        if (in_array($num_usuario,$numeros)) {
            echo "el numero esta en el array";
        } else {
            echo "el numero no esta en el array";
        }
        
    ?>
    <h2>Ejercicio 3</h2>

    <?php
        #mostrar impares
        $numeros = [1,2,3,4,5,6,7,8,9,10];
        #echo count($numeros) - 1;
        for ($i=0; $i < count($numeros); $i++) { 
            if ($i%2!=0 || $i==1) {
                echo "$i, ";
            }
        }

    ?>
    <h2>Ejercicio 4</h2>

    <?php
        #Crea un array de números desordenados y utiliza la función correspondiente para ordenarlos de forma ascendente. Muestra el array antes y después de ordenarlo</li>

        $numeros = [5,8,3,7];
        print_r($numeros);
        echo "<br>";
        asort($numeros);
        print_r($numeros);
        echo "<br>";
    ?>
    <h2>Ejercicio 5</h2>

    <?php
        # Crea un array con varios elementos y usa la función correspondiente para contar cuántos elementos tiene el array, muestra el resultado
        $numeros = [1,2,4,5,7,8];
        echo count($numeros);
    ?>
    <h2>Ejercicio 6</h2>

    <?php
        #Crea un array asociativo que contenga la información de una persona (nombre, apellido1 y edad). Muestra los valores USANDO LAS CLAVES
        $dictionary = array("nombre" => "alex", "apellido1" => "molina", "edad" => "24");
        echo "$dictionary[nombre], $dictionary[apellido1], $dictionary[edad]";
    ?>
    <h2>Ejercicio 7</h2>

    <?php
        #Crear un array de números desordenados, recorrer el array para encontrar el número más grande y el más pequeño, mostrarlos por pantalla
        $numeros = [20,5,7,1,59];
        $menor = max($numeros);
        $mayor = min($numeros);

        for ($i=0; $i < count($numeros); $i++) { 
            if ($numeros[$i]<$menor) {
                $menor = $numeros[$i];
            }
            if ($numeros[$i]>$mayor) {
                $mayor = $numeros[$i];
            }
        }

        echo "el menor es $menor, el mayor es $mayor";

    ?>
    <h2>Ejercicio 8</h2>

    <?php
        #Crear un array vacío, llenarlo gracias a un bucle con números del 1 al 10, mostrar el array completo y a continuación crearme otro array con el orden de los valores invertidos, es decir, si el 1 estaba en la posicion 0 del array, ahora que este en la 9
        $numeros = [];
        for ($i=1; $i < 11; $i++) { 
            array_push($numeros,$i);
        }

        print_r($numeros);
        echo "<br>";
        /*
        $numerosInv = krsort($numeros);
        print_r($numeros);
        */

        $numerosInv = [];
        for ($i=10; $i > 0; $i--) { 
            array_push($numerosInv,$i);
        }
        print_r($numerosInv);

    ?>
    <h2>Ejercicio 9</h2>
            
    <?php
        #Crear un array con los nombres de 10 videojuegos (si no se te ocurre pregunta al de al lado), usa un bucle para mostrar cada juego en una línea diferente
        $juegos = ["LoL", "Valorant", "Fortnite", "Hades", "TBOI", "Valatro", "Minecraft", "Solitario", "AFKArena", "CoD"];
        for ($i=0; $i < count($juegos); $i++) { 
            echo "$juegos[$i] <br>";
        }

        foreach ($juegos as $key) {
            echo "$key <br>";
        }
    ?>
    <h2>Ejercicio 10</h2>

    <?php
        # Crea dos arrays, uno con numeros pares y otro con impares, usa la función correspondiente para combinar ambos arrays y después otra función para ordenarlos
        #$pares = [2,4,6,8,10];
        #$impares = [1,3,5,7,9];
        $pares = [];
        $impares = [];
        
        for ($i=1; $i < 21; $i++) { 
            if ($i%2==0) {
                array_push($pares, $i);
                
            } else{
                array_push($impares, $i);
                
            }
            
        }
        
        $todos = array_merge($pares,$impares);
        asort($todos);
        print_r($todos);
        echo "<br>";
        array_unshift($todos);
        print_r($todos);

    ?>

    <h2>Switch</h2>

    <?php
        #$var = rand(1,3);
        $var = "1";
        switch ($var) {
            case 1 :
                # code...
                echo "esto es 1";
                break;
            case 2:
                # code...
                echo "esto es 2";
                break;
            case 3 :
                # code...
                echo "esto es 3";
                break;
            
            default:
                # code...
                echo "buenas tardes";
                break;
        }
    ?>

    <h2>Match</h2>
    
    <?php
        $dia = 10;
        $nombreDia = match ($dia) {
            1 => "lunes<br>",
            2, 10 => "martes<br>",
            3 => "miercoles<br>",
            4 => "jueves<br>",
            5 => "viernes<br>",
            6 => "sabado<br>",
            7 => "domingo<br>",
            default => "no es un dia de la semana<br>", 
        };
        echo $nombreDia;








    ?>


</body>

</html>