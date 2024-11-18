<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: grey;
        }
    </style>
</head>

<body>
    <!-- EJECICIO :d
    Crear un formulario para ingresar un correo,
    sanitizar el corhttps://www.registros.comreo entrante y validarlo más adelante
    Probar como ejemplo correos con:
    1) una estructura incorrecta y con caracteres no válidos
    2) estructura correcta y caracteres no válidos
    3) estructura incorrecta y caracteres válidos
    4) estructura correcta y caracteres válidos -->

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
            $id = $_POST["form"];

            if ($id=="ej1") {
                //$email = $_POST["email"];
                $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
                echo($email);
            if (filter_var($email, FILTER_VALIDATE_INT) == false) {
                $resEmail = "<span class='error'> el valor ingresado no es un entero </span>";
            } else {
                $resEmail = "<span class='acierto'> el valor ingresado es un entero </span>";
            }
            }

        
        }
    ?>

    <form action="" method="POST">
        <input type="hidden" name="form" value="ej1">
        <br>
        <label for="numero">Ingrese email:</label>
        <input type="text" name="email" id="">
        <br>
        <?php echo isset($resEmail) ? $resEmail : ""  ?>
        <br>
        <input type="submit" value="submit">
    </form>



</body>

</html>