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
    //MOSTRAR TODA LA TABLA
    ?>

    <div class="container mt-4">
        <h1>Proveedores</h1>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>nombre_proveedor</th>
                    <th>ciudad</th>
                    <th>telefono</th>
            </thead>
            <tbody>
                <?php
                $consulta = "SELECT * FROM proveedores";
                $res = $_conexion->query($consulta);
                while ($fila = $res->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$fila['nombre_proveedor']}</td>";
                    echo "<td>{$fila['ciudad']}</td>";
                    echo "<td>{$fila['telefono']}</td>";
                    echo "</tr>";
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