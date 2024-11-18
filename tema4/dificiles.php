<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Ladronzuelo!!!!</h1>

    <?php
    $i = 0;
    $correcto = true;
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {

        $id = $_POST['form'];


        if ($id == 'ej1') {
            $array = [1, 9, 7, 5];
            // $i = isset($i) ?  $_POST['i'] :  0;
            $i = $_POST['i'];
            $secreto = $_POST['numero'];
            echo ("valor secreto introducido $secreto<br>");

            if ($array[$i] != $secreto) {
                $correcto = false;
            }

            // echo ("valor de i $i");
            $i++;
            // echo ("valor de i $i");

            if ($i == (count($array)) && $correcto) {
                echo ("has acertado la clave");
                $i = 0;
            } else if (!$correcto) {
                echo ("no has acertado la clave");
                $correcto = true;
                $i = 0;
            }
        }
    }

    ?>

    Queremos abrir una caja fuerte. Para ello debemos de introducir 4 cifras. Número por número. En caso de que los cuatro números sean correctos se abrirá la caja fuerte felicitándonos y reseteando las variables para un nuevo intento de abrir la caja fuerte.
    En caso de que fallemos en una de las cuatro cifras se reseteará el intento empezando desde la primera cifra de nuevo.
    <br>
    Para los pros: Cuando acabéis el ejercicio y funcione correctamente, añadidme una funcionalidad en la que aparezca una imagen de una bomba en caso de que el usuario falle a la hora poner las cuatro cifras y
    otra imagen de un tesoro en caso de que la caja fuerte sea abierta. Para ello, podéis usar la siguiente estructura:
    <br>
    <form action="/tema4/dificiles.php" method="POST">
        <input type="hidden" name="form" value="ej1" />
        <input type="hidden" name="i" value="<?php echo $i; ?>">
        Numero: <input required type="number" min="0" max="9" name="numero" id="numero" />
        <input type="submit" value="Enviar" />
    </form>






</body>

</html>