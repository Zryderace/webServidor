<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require "conexion.php";
    //esto en todas menos inicio DE SESION
    session_start();
    if (!isset($_SESSION["usuario"])) {
        header("location: usuario/login.php");
        exit;
    }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <?php
        //comprabar usuario normal o admin
        //<a href="nuevo.php" class="btn btn-info btn-lg">Nuevo producto</a>

        $usuario = $_SESSION["usuario"];

        $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $res = $_conexion->query($consulta);
        $info_usuario = $res->fetch_assoc();

        if ($info_usuario["admin"]==1) {
            $admin = '<a href="nuevo.php" class="btn btn-info btn-lg">Nuevo producto</a>';
        }

    ?>

    <div class="container text-center mt-5">
        <h1>Bienvenido a nuestra pagina, <?php echo $_SESSION["usuario"] ?> uwu</h1>
        <p class="mt-3">Elige una opción:</p>
        <div class="d-grid gap-3 col-6 mx-auto mt-4">
            <a href="productos.php" class="btn btn-primary btn-lg">Productos</a>
            <a href="proveedores.php" class="btn btn-secondary btn-lg">Proveedores</a>
            <?php
                echo isset($admin) ? $admin : "";
            ?>
            <a href="usuario/logout.php" class="btn btn-danger">CERRAR SESIÓN</a>
        </div>
    </div>
</body>
</html>