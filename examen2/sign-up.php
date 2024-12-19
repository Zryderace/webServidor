<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>

<body>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            //3campos sanetizar para que no metan codigo y hacer trim

            if (isset($_POST["usuario"])) $temp_usuario = $_POST["usuario"];
            else $temp_usuario = "";

            if (isset($_POST["correo"])) $temp_correo = $_POST["correo"];
            else $temp_correo = "";

            if (isset($_POST["contrasena"])) $temp_contrasena = $_POST["contrasena"];
            else $temp_contrasena = "";

            // echo $temp_contrasena;
            // echo $temp_contrasena;

            if ($temp_usuario=="") {
                $err_usuario = "no has introducido usuario";
            } else {
                $temp_usuario = htmlspecialchars($temp_usuario);
                $temp_usuario = trim($temp_usuario);

                // al menos una minuscula, una mayuscula y entre 5 y 15
                //(?=.*) expresion busqueda anticipada positiva que verifica
                //que la condicion dentro de los parentesis este en algun lugar de la cadena

                //al menos una mayus
                //al menos una minuscula
                //luego caracteres
                //luego la longitud

                if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])[A-Za-z]{5,15}$/",$temp_usuario)) {
                    $err_usuario =  "el usuario no es valido";
                } else {
                    $usuario = $temp_usuario;
                }
            }

            if ($temp_correo=="") {
                $err_correo = "no has introducido correo";
            } else {
                $temp_correo = htmlspecialchars($temp_correo);
                $temp_correo = trim($temp_correo);
                $correo = $temp_correo;
            }

            if ($temp_contrasena=="") {
                $err_contrasena = "no has introducido contrasena";
            } else {
                $temp_contrasena = htmlspecialchars($temp_contrasena);
                $temp_contrasena = trim($temp_contrasena);

                //alfanumericos
                //luego caracteres
                //luego la longitud

                if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[@$!%*?&])[A-Za-z@$!%*?&0-9]{8,15}$/",$temp_contrasena)) {
                    $err_contrasena =  "la contraseña no es valida <br>";
                } else {
                    $contrasena = $temp_contrasena;
                }
            }

        }
    ?>

    <form action="" method="post">
        <label for="usuario">Introduzca el nombre de usuario</label>
        <input type="text" name="usuario">
        <?php echo isset($err_usuario) ? "<p style='color:red;'>$err_usuario</p>" : "" ?>
        <br>
        <label for="correo">Introduzca el correo</label>
        <input type="text" name="correo">
        <?php echo isset($err_correo) ? "<p style='color:red;'>$err_correo</p>" : "" ?>
        <br>
        <label for="contrasena">Introduzca el contraseña</label>
        <input type="text" name="contrasena">
        <?php echo isset($err_contrasena) ? "<p style='color:red;'>$err_contrasena</p>" : "" ?>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if (isset($usuario, $contrasena)) {
        echo "<p style='color:green;'>El usuario con el nombre $usuario se ha logeado</p> <br>";
        echo isset($correo) ? "se ha registrado con el correo $correo " : "";
    }
    ?>
</body>

</html>