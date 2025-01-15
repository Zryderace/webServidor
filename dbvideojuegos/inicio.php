<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require "conexion.php";
    ?>
</head>

<body>
    <div class="container">
        <h1>Iniciar sesión</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario">
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="contrasenia" class="form-control" name="contrasenia">
            </div>
            <div class="mb-3">
                <input type="submit" value="Iniciar sesión" class="btn btn-primary">
            </div>
        </form>
        <h3>Si aún no estas registrado, pincha debajo</h3>
        <a href="registro.php" class="btn btn-secondary">Registrarse</a>
    </div>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_usuario = htmlspecialchars(trim($_POST["usuario"]));
        $temp_contrasenia = htmlspecialchars(trim($_POST["contrasenia"]));
        $usuario = "";
        $contrasenia = "";

        if (strlen($temp_usuario) == 0) {
            $err_usuario = "pon un usuario";
        } else {
            $consulta = "SELECT * FROM usuarios WHERE usuario = '$temp_usuario'";
            $resultado = $_conexion->query($consulta);
            // $usuarios = [];
            // while ($fila = $resultado->fetch_assoc()) {
            //     array_push($usuarios, $fila["nombre_desarrolladora"]);
            // }
            if ($resultado->num_rows != 0) {
                $usuario = $temp_usuario;
                if ($temp_contrasenia=="") {
                    $err_contrasenia = "la contraseña no puede estar vacia";
                } else {
                    $fila = $resultado->fetch_assoc();
                    if (password_verify($temp_contrasenia,$fila["contrasenia"])) {
                        $contrasenia = $temp_contrasenia;
                    } else {
                        die("ERROR: la contraseña no es correcta");
                    }
                }
            } else {
                die("ERROR: el usuario no existe");
            }
        }

        

        if ($usuario!=""&&$contrasenia!="") {
            session_start();
            $_SESSION["usuario"] = $usuario;
            echo("session iniciada correctamente");
            // $_SESSION["contrasenia"] = $contrasenia;
        } else {
            echo("error la contraseña o el usuario no son correctos");
        }



    }

    ?>
</body>

</html>