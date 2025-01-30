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
    ?>
</head>

<body>
    <?php
    echo "<h1>" . $_GET["id_videojuego"] . "</h1>";
    $desarrolladoras = [];

    

    $consulta = "SELECT * FROM desarrolladoras ORDER BY nombre_desarrolladora";
    $resultado = $_conexion->query($consulta);
    $desarrolladoras = [];
    while ($fila = $resultado->fetch_assoc()) {
        array_push($desarrolladoras, $fila["nombre_desarrolladora"]);
    }

    if (!isset($_GET["id_videojuego"])) {
        die("ERROR: no se ha encontrado un id que editar");
    } else {
        $id_videojuego = $_GET["id_videojuego"];
    }

    $consulta = "SELECT * FROM videojuegos WHERE id_videojuego = $id_videojuego";
    $res = $_conexion -> query($consulta);

    if ($res -> num_rows == 0) {
        die("ERROR: no se ha encontrado una fila con el id $id_videojuego");
    } else {
        $juego = $res -> fetch_assoc();
    }

    $titulo = $juego["titulo"] ?? "";
    $nombre_desarrolladora = $juego["nombre_desarrolladora"] ?? "";
    $anno_lanzamiento = $juego["anno_lanzamiento"] ?? "";
    $porcentaje_reseñas = $juego["porcentaje_reseñas"] ?? "";
    $horas_duracion = $juego["horas_duracion"] ?? "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //$id_videojuego = $_POST["id_videojuego"];
        $titulo = $_POST["titulo"];
        $nombre_desarrolladora = $_POST["nombre_desarrolladora"];
        $anno_lanzamiento = $_POST["anno_lanzamiento"];
        $porcentaje_reseñas = $_POST["porcentaje_reseñas"];
        $horas_duracion = $_POST["horas_duracion"];

        $consulta = "UPDATE videojuegos SET
                            titulo = '$titulo',
                            nombre_desarrolladora = '$nombre_desarrolladora',
                            anno_lanzamiento = '$anno_lanzamiento',
                            porcentaje_reseñas = '$porcentaje_reseñas',
                            horas_duracion = '$horas_duracion'
                        WHERE id_videojuego = '$id_videojuego';";

        $_conexion->query($consulta);   
    }

    ?>
    <form action="" method="post">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="<?php echo $juego["titulo"] ?>">
        <select name="nombre_desarrolladora">
            <option value="" disabled selected>
            </option>
            <?php
                foreach ($desarrolladoras as $desarrolladora) {
                    echo "<option value=\"$desarrolladora\">$desarrolladora</option>";
                }
            ?>
        </select>
        <input type="text" name="anno_lanzamiento" value="<?php echo $juego["anno_lanzamiento"] ?>">
        <input type="text" name="porcentaje_reseñas" value="<?php echo $juego["porcentaje_reseñas"] ?>">
        <input type="text" name="horas_duracion" value="<?php echo $juego["horas_duracion"] ?>">
        <input type="submit" value="enviar">
    </form>
</body>

</html>