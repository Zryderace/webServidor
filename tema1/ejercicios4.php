<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--
        -------------------------------------------EJERCICIOS BUCLES WHILE Y DO-WHILE -------------------------------------------
            <li>Usar un número entero y positivo y di si el número introducido es primo o no</li>
            <li>Dado un número N random,  mostrar dicho número por pantalla y todos los números del 1 al N</li>
            <li>Escribir todos los números del 100 al 0 de 7 en 7 dentro de una tabla, en la cabecera aparecerá "Numeros" y en la última fila aparecerá el número de iteraciones que ha hecho el bucle while</li>
            <li>Mostrar el producto de los 10 primeros números impares</li>
            <li>Dado un número entero random,muestra el número y  calcula su factorial usando un bucle while o do-while</li>
            <li>Dado un número random (que debe estar entre 0 y 10), mostrar el número por pantalla y la tabla de multiplicar de dicho número</li>
            <li>Crear 5 números random, mostrarlos por pantalla e indicar si alguno es múltiplo de 3</li>
    -->
    <h2>Ejercicio 1</h2>

    <?php
        $num = rand(2,500);
        $cont = 2;
        $bool = true;
        $num = 0;
        if ($num<=-1) {
            echo("numeros negativos no pueden ser primos <br>");
        } else {
            while ($cont <= $num/2) {
            
                if ($num%$cont == 0) {
                    $bool = false;
                    break;
                }
                $cont++;
            }
            echo($bool ? "es primo<br>" : "no es primo<br>");
        }
        echo("$num <br>");

        $num = rand(2,500);
        $cont = 2;
        $contnum = 2;
        $bool = true;
        $primo1 = 2;
        $primo2 = 0;
        #$num = 13;
        echo("$num <br>");
        #sacar todos los primos de 2 a $num
        while ($contnum <= $num) {
            
            #saca los primos de $contnum
            while ($cont <= $contnum/2) {
                #primo ? true : false
                if ($contnum%$cont == 0) {
                    $bool = false;
                    break;
                }
                $cont++;
            }
            #si es primo, se igual a primo2
            if ($bool) {
                $primo2 = $contnum;
                #si el $primo1 +1 o +2 es == $primo2 lo dice
                if ($primo1+1==$primo2 || $primo1+2==$primo2) {
                    echo("$primo1 y $primo2 son primos hermanos<br>");
                }
                #el primer primo se vuelve el nuevo pequeño
                $primo1 = $primo2;
            }
            #reset
            $cont = 2;
            $bool = true;
            $contnum++;
        }

    ?>

    <h2>Ejercicio 2</h2>

    <?php
    #<li>Dado un número N random,  mostrar dicho número por pantalla y todos los números del 1 al N</li>
    $num = rand(2,10);
    $cont = 1;
    while ($cont <= $num) {
        echo("$cont, ");
        $cont++;
    }
    ?>

    <h2>Ejercicio 3</h2>
    <table>
    <?php
    #<li>Escribir todos los números del 100 al 0 de 7 en 7 dentro de una tabla, en la cabecera aparecerá "Numeros" y en la última fila aparecerá el número de iteraciones que ha hecho el bucle while</li>
    
    $num = 100;
    $cont = 0;
    echo("<th>Numeros</th><tr>");
    while ($num >= 0) {
        echo("<tr><td>$num</td></tr>");
        $num -= 7;
        $cont++;
    }   
    echo("</tr><tr><td>vueltas: $cont</td></tr>");
    

    ?>
    </table>
    <h2>Ejercicio 4</h2>

    <?php
    #<li>Mostrar el producto de los 10 primeros números impares</li>
    $max = 10;
    $cont = 1;
    $contImp = 1;
    $total = 1;

    while ($contImp <= $max) {
        
        if ($cont%2 !== 0) {
            $total *= $cont;
            $contImp++;
        }
        $cont++;
    }

    echo("$total");

    ?>

    <h2>Ejercicio 5</h2>

    <?php
    #<li>Dado un número entero random,muestra el número y  calcula su factorial usando un bucle while o do-while</li>
    $num = rand(2,10);
    echo("$num <br>");
    $cont = 2;
    $total = 1;

    while ($cont <= $num) {
        $total *= $cont;
        $cont++;
    }
    echo("$total")
    ?>

    <h2>Ejercicio 6</h2>

    <?php
    #<li>Dado un número random (que debe estar entre 0 y 10), mostrar el número por pantalla y la tabla de multiplicar de dicho número</li>
    $num = rand(0,10);
    echo("numero:$num <br><br>");
    $cont = 1;
    while($cont<=10){
        echo("$num x $cont es: ".$cont*$num . "<br>");
        $cont++;
    }
    ?>

    <h2>Ejercicio 7</h2>

    <?php
    #<li>Crear 5 números random, mostrarlos por pantalla e indicar si alguno es múltiplo de 3</li>
    $cont = 1;
    while ($cont <= 5) {
        $num = rand(2,500);
        
        if ($num%3==0) {
            echo("$num es multiplo de 3<br>");
        }else {
            echo("$num<br>");
        }
        $cont++;
    }
    ?>

    <!--
            <li>Pedir los coeficientes de una ecuación de 2º grado, y muestre sus soluciones reales. Si no existen, debe indicarlo.</li>
            <li>Con el radio de un círculo, calcular su área. A=PI*r2.</li>
            <li>Con el radio de una circunferencia, calcular su longitud.</li>
            <li>Crear dos variables con dos números y decir si son iguales o no.</li>
            <li>Crear una variable con un número e indicar si es positivo o negativo.</li>
            <li>Contando con dos números, decir si uno es múltiplo del otro o no lo es.</li>
            <li>Contando con dos números, mostrarlos ordenados de mayor a menor.</li>
            <li>Contando con dos números, decir cuál es el mayor o si son iguales.</li>
            <li>Contando con tres números, mostrarlos ordenados de mayor a menor.</li>
    -->

    <h2>Ejercicio 8</h2>
    <?php
    #<li>Pedir los coeficientes de una ecuación de 2º grado, y muestre sus soluciones reales. Si no existen, debe indicarlo.</li>
    
    $a = 2;
    $b = 9;
    $c = 2;

    #x = -b(+ o -) cubo(sqrt(b)-4ac) IF - no se hace / 2a
    $cubo = sqrt(($b*$b)-(4*$a*$c));
    #echo($cubo);
    if (is_nan($cubo)) {
        echo("no tiene solucion real");
    } else {
        $x = (-$b + $cubo)/(2*$a);
        echo("solucion 1: $x <br>");
        $x = (-$b - $cubo)/(2*$a);
        echo("solucion 2: $x");
    }
    ?>
    

    <h2>Ejercicio 9</h2>
    <?php
    #<li>Con el radio de un círculo, calcular su área. A=PI*r^2.</li>
    $radio = 5;

    echo("el area de un circulo radio $radio es " . pi()*$radio*$radio);
    ?>

    <h2>Ejercicio 10</h2>
    <?php
    #<li>Con el radio de una circunferencia, calcular su longitud.</li>
    $radio = 5;

    echo("la circunferencia de un circulo con radio $radio es ". pi()*2*$radio);
    ?>

    <h2>Ejercicio 11</h2>
    <?php
    #<li>Crear dos variables con dos números y decir si son iguales o no.</li>
    $num1 = rand(-10,10);
    $num2 = rand(-10,10);

    echo($num1 == $num2 ? "son iguales" : "no son iguales")
    ?>

    <h2>Ejericico 12</h2>
    <?php
    #<li>Crear una variable con un número e indicar si es positivo o negativo.</li>
    echo(match (true) {
        $num1 <= -1 => "negativo",
        $num1 >= 1 => "positivo",
        default => "es 0"
    })
    ?>

    <h2>Ejercicio 13</h2>
    <?php
    #<li>Contando con dos números, decir si uno es múltiplo del otro o no lo es.</li>
    echo(match (true) {
        $num1%$num2===0 => "el $num2 es multiplo de $num1",
        $num2%$num1===0 => "el $num1 es multiplo de $num2",
        default => "no son multiplos"
    })
    ?>

    <h2>Ejercicio 14</h2>
    <?php
    #<li>Contando con dos números, mostrarlos ordenados de mayor a menor.</li>
    echo(match (true) {
        $num1<$num2 => "$num2, $num1",
        $num1>$num2 => "$num1, $num2",
        default => "son iguales"
    })
    ?>

    <h2>Ejercicio 15</h2>
    <?php
    #<li>Contando con dos números, decir cuál es el mayor o si son iguales.</li>
    echo(match (true) {
        $num1<$num2 => "$num2 es mayor que $num1",
        $num1>$num2 => "$num1 es mayor que $num2",
        default => "son iguales"
    })
    ?>

    <h2>Ejercicio 16</h2>
    <?php
    #<li>Contando con tres números, mostrarlos ordenados de mayor a menor.</li>
    $num3 = rand(-10,10);
    $arr = [$num1,$num2,$num3];
    asort($arr);
    print_r($arr);
    ?>



</body>
</html>