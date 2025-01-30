<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require "../conexion.php";
    //esto en todas menos inicio DE SESION
    session_start();
    // if (!isset($_SESSION["usuario"])) {
    //     header("location: signup.php");
    //     exit;
    // }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $usuario = $_POST["usuario"];
            $contrasena = $_POST["contrasena"];
            //esto es "on" para check y "" para unchecked
            
            if(isset($_POST["admin"])) $admin = true;
            else $admin = false;
            
            //COMPROBAR USUARIO NO EXISTA YA   

            $contrasenaCifrada = password_hash($contrasena, PASSWORD_DEFAULT);

            $consulta = "INSERT INTO usuarios VALUES ('$usuario', '$contrasenaCifrada', '$admin')";
            $_conexion -> query($consulta);
            

            // echo $admin;
        }
    ?>

    <div class="container">
        <h1>Sign Up</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="contrasena" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Admin?</label>
                <input type="checkbox" name="admin" id="">
            </div>
            <div class="mb-3">
                <input type="submit" value="Registrar usuario" class="btn btn-primary">
            </div>
        </form>
        <h3>Si estas registrado, pincha debajo</h3>
        <a href="login.php" class="btn btn-secondary">Iniciar Sesion</a>
    </div>
</body>

</html>