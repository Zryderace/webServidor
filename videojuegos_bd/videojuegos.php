<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        require "conexion.php";
        $order_by = $_GET['order_by'] ?? 'id_videojuego'; // Orden por defecto
        $direction = $_GET['direction'] ?? 'ASC'; // Dirección por defecto
    ?>
</head>
<body>
    <div class="container mt-4">
        <h1>Listado de videojuegos</h1>
        <div class="mb-3">
            <a href="index.php" class="btn btn-secondary">Volver al menú principal</a>
            <a href="?order_by=resennas&direction=ASC" class="btn btn-info">Ordenar por reseñas (Asc)</a>
            <a href="?order_by=resennas&direction=DESC" class="btn btn-info">Ordenar por reseñas (Desc)</a>
            <a href="?order_by=id_videojuego&direction=ASC" class="btn btn-warning">Ordenar por ID (Asc)</a>
            <a href="?order_by=id_videojuego&direction=DESC" class="btn btn-warning">Ordenar por ID (Desc)</a>
        </div>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Desarrolladora</th>
                    <th>Año de lanzamiento</th>
                    <th>Reseñas</th>
                    <th>Duración</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $consulta = "SELECT * FROM videojuegos ORDER BY $order_by $direction";
                    $res = $_conexion->query($consulta);
                    while ($fila = $res->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$fila['id_videojuego']}</td>";
                        echo "<td>{$fila['titulo']}</td>";
                        echo "<td>{$fila['nombre_desarrolladora']}</td>";
                        echo "<td>{$fila['anno_lanzamiento']}</td>";
                        echo "<td>{$fila['resennas']}</td>";
                        echo "<td>{$fila['horas_duracion']}</td>";
                        echo "<td>
                                <a class='btn btn-primary btn-sm' href='edit.php?id_videojuego={$fila['id_videojuego']}'>Editar</a>
                                <form action='' method='post' style='display:inline;'>
                                    <input type='hidden' name='id_videojuego' value='{$fila['id_videojuego']}'>
                                    <button class='btn btn-danger btn-sm' type='submit'>Borrar</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
