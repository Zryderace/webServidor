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
        <h1>Formulario de registro UwU</h1>
        <form action="" method="post" enctype="multipart/form-data" class="col-4">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" name="usuario" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="contrasenia" class="form-control">
            </div>
            <div class="mb-3">
                <input type="submit" value="Registrarse" class="btn btn-primary">
            </div>
        </form>
        <h3>Si ya tienes cuenta, inicia sesión</h3>
        <a href="iniciar_sesion.php" class="btn btn-secondary">Iniciar sesión</a>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_usuario = htmlspecialchars(trim($_POST["usuario"]));
        $temp_contrasenia = htmlspecialchars(trim($_POST["contrasenia"]));
        $usuario = "";
        $contrasenia = "";

        if (strlen($temp_usuario) > 50) {
            $err_usuario = "el usuario debe tener menos de 50 caracteres";
        } elseif ($temp_usuario == "") {
            $err_usuario = "el usuario no puede estar vacio";
        } else {
            $consulta = "SELECT * FROM usuarios WHERE usuario = '$temp_usuario'";
            $resultado = $_conexion->query($consulta);
            // $usuarios = [];
            // while ($fila = $resultado->fetch_assoc()) {
            //     array_push($usuarios, $fila["nombre_desarrolladora"]);
            // }
            if ($resultado -> num_rows==0) {
                $usuario = $temp_usuario;
            } else {
                die("ERROR: el usuario ya existe");
            }
        }

        if ($temp_contrasenia=="") {
            $err_contrasenia = "la contraseña no puede estar vacia";
        } else {
            $contrasenia = password_hash($temp_contrasenia,PASSWORD_DEFAULT);
        }

        if ($usuario!=""&&$contrasenia!="") {
            $consulta = "INSERT INTO usuarios
                        (usuario,
                        contrasenia)
                        VALUES
                        ('$usuario',
                        '$contrasenia')";
            $resultado = $_conexion->query($consulta);
        }



    }
    ?>

</body>

</html>