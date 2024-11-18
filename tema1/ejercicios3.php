<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--
        <li> Crea un script que utilice una variable con un número del 1 al 7 generado de forma aleatoria para representar los días de la semana (1 para el lunes, 2 para el martes..)</li>
            
        <li> Crea un script donde una variable contenga una calificación de un examen generada de forma aleatoria. Mostrar un "Sobresaliente" si la nota es 10; si es 8 o 9, "Notable"; si es 6 o 7, "Bien"; si es 5, "Aprobao"; si es menor a 5, "Suspenso"</li>
            
        <li> Crea un script donde se elija una operación matemática básica (suma, resta, multiplicación o división). Realiza la opción matemática indicada a través de una variable. NOTA: Debe de haber una variable para elegir la operación matemática y dos variables numéricas para saber con qué dos números vamos a trabajar</li>
            
        <li> Crea un script donde una variable contenga un número del 1 al 7 (puedes usar rand para que este numero se genere aleatoriamente) que represente un día de la semana (1 para lunes, 2 para martes, etc.). Usa match para devolver el nombre del día correspondiente.</li>
            
        <li> Crea un script donde una variable contenga el número del mes (del 1 al 12). Usa match para determinar la estación del año correspondiente según el mes y muestra el resultado. Las estaciones son:

                Invierno: Diciembre (12), Enero (1), Febrero (2)
                Primavera: Marzo (3), Abril (4), Mayo (5)
                Verano: Junio (6), Julio (7), Agosto (8)
                Otoño: Septiembre (9), Octubre (10), Noviembre (11)</li>
        
<li> Crea un script que realice una operación matemática básica (suma, resta, multiplicación o división) entre dos números. Usa match para determinar qué operación realizar según la variable que indique el tipo de operación</li>
    -->
    <h2>Ejercicio 1</h2>
    <?php
        $var = rand(1,7);
        /**
        *echo match ($var) {
        *    1 => "Lunes",
        *    2 => "Martes",
        *    3 => "Miercoles",
        *    4 => "jueves",
        *    5 => "viernes",
        *    6 => "sabado",
        *    7 => "domingo"
        *};
        */
        

        switch ($var) {
            case 1:
                $var = "lunes";
                break;
            case 2:
                $var = "martes";
                break;
            case 3:
                $var = "miercoles";
                break;
            case 4:
                $var = "jueves";
                break;
            case 5:
                $var = "viernes";
                break;
            case 6:
                $var = "sabado";
                break;
            case 7:
                $var = "domingo";
                break;    
        }

        echo($var);

    ?>
    <h2>Ejercicio 2</h2>
    <?php
        $var = rand(1,10);
        
        echo match (true) {
            $var == 10 => "sobresaliente",
            $var >= 8 && $var < 10 => "notable",
            $var >= 6 && $var < 8 => "bien",
            $var >= 5 && $var <6 => "aprobao",
            $var < 5 => "suspenso"
        }
    ?>
    <h2>Ejercicio 3</h2>
    <?php
        $var = rand(1,4);
        $num1 = 2;
        $num2 = 5;
        switch ($var) {
            case 1:
                $var = $num1 + $num2;
                break;
            case 2:
                $var = $num1 - $num2;
                break;
            case 3:
                $var = $num1 * $num2;
                break;
            case 4:
                $num2 == 0 ? $var = "no se puede dividir entre 0" : $var = $num1 / $num2;
                break;
        }

        echo($var);

        
    ?>
    <h2>Ejercicio 4</h2>
    <?php
        $var = rand(1,7);

        echo match ($var) {
            1 => "Lunes",
            2 => "Martes",
            3 => "Miercoles",
            4 => "jueves",
            5 => "viernes",
            6 => "sabado",
            7 => "domingo"
        }
    ?>
    <h2>Ejercicio 5</h2>
    <?php
        $var = rand(1,12);

        echo match ($var) {
            12,1,2 => "invierno",
            3,4,5 => "primavera",
            6,7,8 => "verano",
            9,10,11 => "otoño"
        }
    ?>
    <h2>Ejercicio 6</h2>
    <?php
        $var = rand(1,4);
        $num1 = 2;
        $num2 = 0;
        
            echo match ($var) {
                1 => $num1 + $num2,
                2 => $num1 - $num2,
                3 => $num1 * $num2,
                4 => $num2 == 0 ? $var = "no se puede dividir entre 0" : $var = $num1 / $num2,
            };
    ?>



</body>

</html>