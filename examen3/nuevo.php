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
    //FORM DATOS, VALIDAR RELLENOS Y VALIDAR DATOS
    //SI TODO ES CORRECTO SE METE
    //PROVEEDORES ES UN SELECT DE PRODUCTOS.NOMBRE_PROVEEDOR
    //ENLACE PARA VOLVER

    $consulta = "SELECT * FROM productos";
    $resultado = $_conexion->query($consulta);
    $proveedores = [];
    while ($fila = $resultado->fetch_assoc()) {
        array_push($proveedores, $fila["nombre_proveedor"]);
    }

    // Inicializar variables y errores
    $nombre_producto = $categoria_producto = $precio = $stock = $nombre_proveedor = "";
    $errores = false;

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
        <input type="text" name="nombre_producto" value="">
        <?= $err_nombre_producto ?? "" ?>
        <br><br>

        <label for="nombre_proveedor">Estudio:</label>
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
        <input type="text" name="categoria_producto" value="">
        <?= $err_categoria_producto ?? "" ?>
        <br><br>

        <label for="precio">precio:</label>
        <input type="text" name="precio" value="">
        <?= $err_precio ?? "" ?>
        <br><br>

        <label for="stock">stock:</label>
        <input type="text" name="stock" value="">
        <?= $err_stock ?? "" ?>
        <br><br>

        <input type="submit" value="CREAR">
        <a href="index.php">Volver</a>
    </form>
</body>

</html>