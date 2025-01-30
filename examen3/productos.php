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
    $order_by = $_GET['order_by'] ?? 'precio'; // Orden por defecto
    $direction = $_GET['direction'] ?? 'ASC'; // Dirección por defecto
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    //mostrar todos los productos
    //SOLO PARA ADMIN ACCIONES CON UN ENLACE EDITAR CON ID DE PRODUCTO POR URL
    //QUE LLEVA A editar.php 
    //TAMBIEN UNA PARA BORRAR LA FIL EN LA QUE ESTA, USAR HIDDEN Y EL VALOR
    //ENCIMA DE LA TABLA 4 BOTONES PARA CAMBIAR EL ORDER BY
    //PRECIO ASC - PRECIO DESC - ID ASC - ID DESC
    //DEBAJO DE LA TABLA ENLACE A INDEX

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //$id_videojuego = $_POST["id_videojuego"];
        $id_producto = $_POST["id_producto"] ?? "";

        //haya algun numero de producto
        if ($id_producto != "") {
            $consulta = "SELECT * FROM productos WHERE $id_producto = '$id_producto'";
            $res = $_conexion->query($consulta);
            //haya producto con ID
            if ($res->num_rows > 0) {
                $consulta = "DELETE FROM productos WHERE id_producto = $id_producto";
                $_conexion->query($consulta);
            }
        }
    }

    //prefiero comporbar lo de admin cada vez en vez de usar otra $_SESSION

    $usuario = $_SESSION["usuario"];

    $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $res = $_conexion->query($consulta);
    $info_usuario = $res->fetch_assoc();

    if ($info_usuario["admin"] == 1) {
        $admin = true;
    } else {
        $admin = false;
    }

    $consulta = "SELECT * FROM productos ORDER BY $order_by $direction";
    $resultado = $_conexion->query($consulta);

    ?>

    <div class="container mt-4">
        <h1>Productos</h1>
        <div class="mb-3">
            <a href="?order_by=precio&direction=ASC" class="btn btn-info">Ordenar por reseñas (Asc)</a>
            <a href="?order_by=precio&direction=DESC" class="btn btn-info">Ordenar por reseñas (Desc)</a>
            <a href="?order_by=id_producto&direction=ASC" class="btn btn-warning">Ordenar por ID (Asc)</a>
            <a href="?order_by=id_producto&direction=DESC" class="btn btn-warning">Ordenar por ID (Desc)</a>
        </div>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID Producto</th>
                    <th>nombre_producto</th>
                    <th>categoria_producto</th>
                    <th>precio</th>
                    <th>stock</th>
                    <th>nombre_proveedor</th>
                    <?php
                    if ($admin) {
                        echo "<th>Editar</th><th>Borrar</th>";
                    }
                    ?>
            </thead>
            <tbody>
                <?php
                $consulta = "SELECT * FROM productos ORDER BY $order_by $direction";
                $res = $_conexion->query($consulta);
                while ($fila = $res->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$fila['id_producto']}</td>";
                    echo "<td>{$fila['nombre_producto']}</td>";
                    echo "<td>{$fila['categoria_producto']}</td>";
                    echo "<td>{$fila['precio']}</td>";
                    echo "<td>{$fila['stock']}</td>";
                    echo "<td>{$fila['nombre_proveedor']}</td>";
                    // echo "</tr>";

                    if ($admin) {
                        echo "<td>
                                <a class='btn btn-primary btn-sm' href='editar.php?id_producto={$fila['id_producto']}'>Editar</a>
                            </td>
                            <td>
                                <form action='' method='post' style='display:inline;'>
                                    <input type='hidden' name='id_producto' value='{$fila['id_producto']}'>
                                    <button class='btn btn-danger btn-sm' type='submit'>Borrar</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="mb-3">
            <a href="index.php" class="btn btn-secondary">Volver al menú principal</a>
        </div>
    </div>

</body>

</html>