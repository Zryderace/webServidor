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
    //si no es admin lo mata
    $user = $_SESSION["usuario"];
    $consulta = "SELECT * FROM usuarios WHERE usuario = '$user'";
    $res = $_conexion->query($consulta);
    $info_usuario = $res->fetch_assoc();

    if ($info_usuario["admin"] != 1) {
        session_destroy();
        header("location: usuario/login.php");
        exit;
    }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php

    $consulta = "SELECT * FROM productos";
    $resultado = $_conexion->query($consulta);
    $proveedores = [];
    while ($fila = $resultado->fetch_assoc()) {
        array_push($proveedores, $fila["nombre_proveedor"]);
    }

    // Inicializar variables y errores
    $nombre_producto = $categoria_producto = $precio = $stock = $nombre_proveedor = "";
    $errores = false;
    
     //cambiar
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_videojuego = $_POST["id_videojuego"];
        $nombre = $_POST["titulo"];
        $desarrolladora = $_POST["nombre_desarrolladora"];
        $lanzamiento = $_POST["anno_lanzamiento"];
        $resenas = $_POST["resennas"];
        $duracion = $_POST["horas_duracion"];

        $consulta = "UPDATE videojuegos SET
                            titulo = '$nombre',
                            nombre_desarrolladora = '$desarrolladora',
                            anno_lanzamiento = $lanzamiento,
                            resennas = $resenas,
                            horas_duracion = $duracion 
                            WHERE id_videojuego = $id_videojuego";
        $_conexion->query($consulta);
    }

    $consulta = "SELECT * FROM productos";
    $resultado = $_conexion->query($consulta);

    $proveedores = [];

    while ($fila = $resultado->fetch_assoc()) {
        array_push($proveedores, $fila["nombre_proveedor"]);
    }

    echo "<h1> Has elegido modificar el producto con el identificador número " . $_GET["id_producto"] . "</h1>";

    if (!isset($_GET["id_producto"])) die("ERROR: No se especificó ningún juego");
    else $id_producto = $_GET["id_producto"];

    $consulta = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
    $resultado = $_conexion->query($consulta);

    if ($resultado->num_rows === 0) die("ERROR: No se encontró el producto con el ID $id_producto");
    else $producto = $resultado->fetch_assoc();

    $nombre_producto = $producto["nombre_producto"] ?? "";
    $nombre_proveedor = $producto["anno_lanzamiento"] ?? "";
    $categoria_producto = $producto["categoria_producto"] ?? "";
    $precio = $producto["precio"] ?? "";
    $stock = $producto["stock"] ?? "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Sanitizar y recoger
        $nombre_producto = htmlspecialchars(trim($_POST["nombre_producto"] ?? ""));
        $nombre_proveedor = $_POST["nombre_proveedor"] ?? "";
        $categoria_producto = htmlspecialchars(trim($_POST["categoria_producto"] ?? ""));
        $precio = $_POST["precio"] ?? "";
        $stock = $_POST["stock"] ?? "";

        $errores = false;

        //Validar
        if ($nombre_producto === "") {
            $err_nombre_producto = "<p>El título no puede estar vacio</p>";
            $errores = true;
        }

        if (!in_array($nombre_proveedor, $proveedores)) {
            $err_nombre_proveedor = "<p>Seleccione un proveedor válido.</p>";
            $errores = true;
        }

        if ($categoria_producto === "") {
            $err_categoria_producto = "<p>La categoria no puede estar vacia.</p>";
            $errores = true;
        }

        if (!is_numeric($precio)) {
            $err_precio = "<p>El precio no puede estar vacio</p>";
            $errores = true;
        } else if ($precio < 0) {
            $err_precio = "<p>El precio no puede ser menor a cero</p>";
            $errores = true;
        }

        if (!is_numeric($stock)) {
            $err_stock = "<p>El stock no puede estar vacio</p>";
            $errores = true;
        } else if ($stock < 0) {
            $err_stock = "<p>El stock no puede ser menor a cero</p>";
            $errores = true;
        }

        //Insertar si ta to bien
        if (!$errores) {
            $consulta = "INSERT INTO productos(
                                            nombre_producto,
                                        categoria_producto,
                                        precio,
                                        stock,
                                        nombre_proveedor) VALUES 
                                        ('$nombre_producto',
                                        '$categoria_producto',
                                        '$precio',
                                        '$stock',
                                        '$nombre_proveedor')";

            if ($_conexion->query($consulta)) {
                echo "<p>El producto se ha añadido correctamente.</p>";
            } else {
                echo "<p>Error al insertar el producto: " . $_conexion->error . "</p>";
            }
        }
    }


    ?>


    <form action="" method="post" enctype="multipart/form-data">
        <label for="nombre_producto">nombre_producto:</label>
        <input type="text" name="nombre_producto" value="<?php echo $producto["nombre_producto"] ?>">
        <?= $err_nombre_producto ?? "" ?>
        <br><br>

        <label for="nombre_proveedor">proveedor:</label>
        <select name="nombre_proveedor">
            <option value="" disabled selected>ELIJA PROVEEDOR</option>
            <?php
            foreach ($proveedores as $proveedor) {
                echo "<option value=\"$proveedor\">$proveedor</option>";
            }
            ?>
        </select>
        <?= $err_nombre_proveedor ?? "" ?>
        <br><br>

        <label for="categoria_producto">categoria_producto:</label>
        <input type="text" name="categoria_producto" value="<?php echo $producto["nombre_producto"] ?>">
        <?= $err_categoria_producto ?? "" ?>
        <br><br>

        <label for="precio">precio:</label>
        <input type="text" name="precio" value="<?php echo $producto["nombre_producto"] ?>">
        <?= $err_precio ?? "" ?>
        <br><br>

        <label for="stock">stock:</label>
        <input type="text" name="stock" value="<?php echo $producto["nombre_producto"] ?>">
        <?= $err_stock ?? "" ?>
        <br><br>

        <input type="submit" value="Editar">
        <a href="index.php">Volver</a>
    </form>
</body>

</html>