<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear juego</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        require "conexion.php";
    ?>
    <style>
        .cagada { color: red; }
        .tabien { color: green; }
    </style>
</head>
<body>
    <?php
    /**
     * Restricciones de validación:
     * Título: Debe tener entre 3 y 80 caracteres.
     *  Desarrolladora: Debe seleccionarse del desplegable (valor válido).
     *  Año de lanzamiento: Debe ser un número entre 1950 y el año actual.
     *  Reseñas: Debe ser un número entre 0 y 100.
     
     *  Duración: Debe ser un número positivo o -1 para juegos como servicio.
     */
        // Cargar desarrolladoras
        $consulta = "SELECT * FROM desarrolladoras ORDER BY nombre_desarrolladora";
        $resultado = $_conexion -> query($consulta);
        $desarrolladoras = [];
        while($fila = $resultado -> fetch_assoc()){
            array_push($desarrolladoras, $fila["nombre_desarrolladora"]);
        }

        // Inicializar variables y errores
        $titulo = $nombre_desarrolladora = $anno_lanzamiento = $resennas = $horas_duracion = "";
        $errores = false;

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //Sanitizar y recoger
            $titulo = htmlspecialchars(trim($_POST["titulo"] ?? ""));
            $nombre_desarrolladora = $_POST["nombre_desarrolladora"] ?? "";
            $anno_lanzamiento = $_POST["anno_lanzamiento"] ?? "";
            $resennas = $_POST["resennas"] ?? "";
            $horas_duracion = $_POST["horas_duracion"] ?? "";

            //Validar
            if ($titulo === "" || strlen($titulo) < 3 || strlen($titulo) > 80) {
                $err_titulo = "<p class='cagada'>El título debe tener entre 3 y 80 caracteres.</p>";
                $errores = true;
            }

            if (!in_array($nombre_desarrolladora, $desarrolladoras)) {
                $err_desarrolladora = "<p class='cagada'>Seleccione una desarrolladora válida.</p>";
                $errores = true;
            }

            if (!is_numeric($anno_lanzamiento) || $anno_lanzamiento < 1950 || $anno_lanzamiento > date("Y")) {
                $err_anno = "<p class='cagada'>El año de lanzamiento debe estar entre 1950 y el año actual.</p>";
                $errores = true;
            }

            if (!is_numeric($resennas) || $resennas < 0 || $resennas > 100) {
                $err_resennas = "<p class='cagada'>Las reseñas deben ser un número entre 0 y 100.</p>";
                $errores = true;
            }

            if (!is_numeric($horas_duracion) || ($horas_duracion != -1 && $horas_duracion < 0)) {
                $err_duracion = "<p class='cagada'>La duración debe ser un número positivo o -1.</p>";
                $errores = true;
            }

            //Insertar si ta to bien
            if (!$errores) {
                $consulta = "INSERT INTO videojuegos (
                                        titulo,
                                        nombre_desarrolladora,
                                        anno_lanzamiento,
                                        resennas,
                                        horas_duracion) VALUES 
                                        ('$titulo',
                                        '$nombre_desarrolladora',
                                        $anno_lanzamiento,
                                        $resennas,
                                        $horas_duracion)";
                
                if ($_conexion->query($consulta)) {
                    echo "<p class='tabien'>El juego se ha añadido correctamente.</p>";
                } else {
                    echo "<p class='cagada'>Error al insertar el juego: " . $_conexion->error . "</p>";
                }
            }
        }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="<?= $titulo ?>">
        <?= $err_titulo ?? "" ?>
        <br><br>

        <label for="nombre_desarrolladora">Estudio:</label>
        <select name="nombre_desarrolladora">
            <option value="" selected disabled hidden>--ELIJA SU DESARROLLADORA--</option>
            <?php foreach($desarrolladoras as $desarrolladora){ ?>
                <option value="<?= $desarrolladora ?>" <?= $nombre_desarrolladora == $desarrolladora ? "selected" : "" ?>>
                    <?= $desarrolladora ?>
                </option>
            <?php } ?>
        </select>
        <?= $err_desarrolladora ?? "" ?>
        <br><br>

        <label for="anno_lanzamiento">Año de lanzamiento:</label>
        <input type="text" name="anno_lanzamiento" value="<?= $anno_lanzamiento ?>">
        <?= $err_anno ?? "" ?>
        <br><br>

        <label for="resennas">Reseñas de Steam (%):</label>
        <input type="text" name="resennas" value="<?= $resennas ?>">
        <?= $err_resennas ?? "" ?>
        <br><br>

        <label for="horas_duracion">Duración (horas):</label>
        <input type="text" name="horas_duracion" value="<?= $horas_duracion ?>">
        <?= $err_duracion ?? "" ?>
        <br><br>

        <input type="submit" value="CREAR">
        <a href="index.php">Volver</a>
    </form>
</body>
</html>
