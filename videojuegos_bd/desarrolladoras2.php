<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de desarrolladoras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        require "conexion.php";
        $order_by = $_GET['order_by'] ?? 'id_desarrolladora'; // Orden por defecto
        $direction = $_GET['direction'] ?? 'ASC'; // Dirección por defecto
    ?>
</head>
<body>
    <div class="container mt-4">
        <h1>Listado de desarrolladoras</h1>
        <a href="index.php" class="btn btn-secondary mb-3">Volver al menú principal</a>

        <div class="mb-3">
            <a href="?order_by=id_desarrolladora&direction=ASC" class="btn btn-info">Ordenar por ID (Asc)</a>
            <a href="?order_by=id_desarrolladora&direction=DESC" class="btn btn-info">Ordenar por ID (Desc)</a>
            <a href="?order_by=anno_fundacion&direction=ASC" class="btn btn-info">Ordenar por Año de Fundación (Asc)</a>
            <a href="?order_by=anno_fundacion&direction=DESC" class="btn btn-info">Ordenar por Año de Fundación (Desc)</a>
        </div>

        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ciudad</th>
                    <th>Año de Fundación</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $consulta = "SELECT * FROM desarrolladoras ORDER BY $order_by $direction";
                    $res = $_conexion->query($consulta);
                    while ($fila = $res->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$fila['id_desarrolladora']}</td>";
                        echo "<td>{$fila['nombre_desarrolladora']}</td>";
                        echo "<td>{$fila['ciudad']}</td>";
                        echo "<td>{$fila['anno_fundacion']}</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
