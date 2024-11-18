<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: grey;
        }

        .error {
            color: red;
        }

        .acierto {
            color: greenyellow;
        }
    </style>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_POST["form"];

        if ($id=="ej1") {
            $entero = $_POST["numero"];
            if (filter_var($entero, FILTER_VALIDATE_INT) == false) {
                $resInt = "<span class='error'> el valor ingresado no es un entero </span>";
            } else {
                $resInt = "<span class='acierto'> el valor ingresado es un entero </span>";
            }
            $float = $_POST["float"];
            if (filter_var($float, FILTER_VALIDATE_FLOAT) == false) {
                $resDec = "<span class='error'> el valor ingresado no es un decimal </span>";
            } else {
                $resDec = "<span class='acierto'> el valor ingresado es un decimal </span>";
            }
        }

        if ($id == "ej2") {
            $email = $_POST["email"];
            if (filter_var($email, FILTER_SANITIZE_EMAIL) == false) {
                $resEmail = "<span class='error'> el valor ingresado no es un mail </span>";
            } else {
                $resEmail = "<span class='acierto'> el valor ingresado es un mail </span>";
            }
        }

        if ($id == "ej3") {
            $url = $_POST["url"];
            if (filter_var($url, FILTER_SANITIZE_URL, FILTER_VALIDATE_URL) == false) {
                $resUrl = "<span class='error'> el valor ingresado no es un url </span>";
            } else {
                $resUrl = "<span class='acierto'> el valor ingresado es un url </span>";
            }
        }

        if ($id == "ej4") {
            $bool = $_POST["boolean"];
            if (filter_var($bool, FILTER_VALIDATE_BOOL) == false) {
                $resBool = "<span class='error'> el valor ingresado no es un bool </span>";
            } else {
                $resBool = "<span class='acierto'> el valor ingresado es un boll </span>";
            }
        }
        //inacabado
        if ($id == "ej5") {
            $url = $_POST["url"];
            if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                $resInt = "<span class='error'> el valor ingresado no es un mail </span>";
            } else {
                $resInt = "<span class='acierto'> el valor ingresado es un mail </span>";
            }
        }

        if ($id == "ej6") {
            $url = $_POST["url"];
            if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                $resInt = "<span class='error'> el valor ingresado no es un mail </span>";
            } else {
                $resInt = "<span class='acierto'> el valor ingresado es un mail </span>";
            }
        }

        if ($id == "ej7") {
            $url = $_POST["url"];
            if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                $resInt = "<span class='error'> el valor ingresado no es un mail </span>";
            } else {
                $resInt = "<span class='acierto'> el valor ingresado es un mail </span>";
            }
        }
    }


    ?>

    <form action="" method="post">
        <input type="hidden" name="form" value="ej1">
        <label for="numero">Ingrese numero entero:</label>
        <input type="text" name="numero" id="">
        <br>
        <?php echo isset($resInt) ? $resInt : ""  ?>
        <br>
        <label for="numero">Ingrese numero decimal:</label>
        <input type="text" name="float" id="">
        <br>
        <?php echo isset($resDec) ? $resDec : ""  ?>

        <input type="submit" value="submit">
    </form>

    <form action="" method="POST">
        <input type="hidden" name="form" value="ej2">
        <br>
        <label for="numero">Ingrese email:</label>
        <input type="text" name="email" id="">
        <br>
        <?php echo isset($resEmail) ? $resEmail : ""  ?>
        <br>
        <input type="submit" value="submit">
    </form>

    <form action="" method="POST">
        <input type="hidden" name="form" value="ej3">
        <br>
        <label for="numero">Ingrese url:</label>
        <input type="text" name="url" id="">
        <br>
        <?php echo isset($resUrl) ? $resUrl : ""  ?>
        <br>
        <input type="submit" value="submit">
    </form>

    <form action="" method="POST">
        <input type="hidden" name="form" value="ej4">
        <br>
        <label for="numero">Ingrese boolean:</label>
        <input type="text" name="boolean" id="">
        <br>
        <?php echo isset($resBool) ? $resBool : ""  ?>
        <br>
        <input type="submit" value="submit">
    </form>

    <form action="" method="POST">
        <input type="hidden" name="form" value="ej5">
        <br>
        <label for="numero">Ingrese dominio:</label>
        <input type="text" name="dominio" id="">
        <br>
        <?php echo isset($resDom) ? $resDom : ""  ?>
        <br>
        <input type="submit" value="submit">
    </form>

    <form action="" method="POST">
        <input type="hidden" name="form" value="ej6">
        <br>
        <label for="numero">Ingrese IP:</label>
        <input type="text" name="IP" id="">
        <br>
        <?php echo isset($resIP) ? $resIP : ""  ?>
        <br>
        <input type="submit" value="submit">
    </form>

    <form action="" method="POST">
        <input type="hidden" name="form" value="ej7">
        <br>
        <label for="numero">Ingrese big mac:</label>
        <input type="text" name="mac" id="">
        <br>
        <?php echo isset($resMac) ? $resMac : ""  ?>
        <br>
        <input type="submit" value="submit">
    </form>

    <!-- EJECICIO :d
            Crear un formulario para ingresar un correo, 
            sanitizar el correo entrante y validarlo más adelante
            Probar como ejemplo correos con:
            1) una estructura incorrecta y con caracteres no válidos
            2) estructura correcta y caracteres no válidos
            3) estructura incorrecta y caracteres válidos
            4) estructura correcta y caracteres válidos -->


</body>

</html>