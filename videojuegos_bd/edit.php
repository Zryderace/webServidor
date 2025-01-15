<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        require "conexion.php";
    ?>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $id_videojuego = $_POST["id_videojuego"];
            $nombre = $_POST["titulo"];
            $desarrolladora=$_POST["nombre_desarrolladora"];
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
            $_conexion -> query($consulta);
        }

        $consulta = "SELECT * FROM desarrolladoras ORDER BY nombre_desarrolladora";
        $resultado = $_conexion -> query($consulta);
        
        $desarrolladoras = [];

        while($fila = $resultado -> fetch_assoc()){
            array_push($desarrolladoras, $fila["nombre_desarrolladora"]);
        }
        
        echo "<h1> Has elegido modificar el videojuego con el identificador número " . $_GET["id_videojuego"] . "</h1>";
        
        if(!isset($_GET["id_videojuego"])) die("ERROR: No se especificó ningún juego");
        else $id_videojuego = $_GET["id_videojuego"];
       
        $consulta = "SELECT * FROM  videojuegos WHERE id_videojuego = '$id_videojuego'";
        $resultado = $_conexion -> query($consulta);
        
        if($resultado -> num_rows === 0) die("ERROR: No se encontró el videojuego con el ID $id_videojuego");
        else $juego = $resultado -> fetch_assoc();
        
        $titulo = $juego["titulo"] ?? "";
        $anno_lanzamiento = $juego["anno_lanzamiento"] ?? "";
        $resennas = $juego["resennas"] ?? "";
        $duracion = $juego["horas_duracion"] ?? "";
    ?>

    <form action="" method="post" enctype="multipart/form-data"> <!-- 
                                                                        Especificar cómo se debe de codificar los datos del formulario
                                                                        antes de enviarlos al server. El valor multipart.. dice que
                                                                        el formulario puede manejar datos mixtos, como texto y archivos
                                                                -->
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input class="form-control" type="text" name="titulo" value="<?php echo $juego["titulo"] ?>" >
        </div>
        <div class="mb-3">
            <label class="form-label">Desarrolladora</label>
            <select class="form-select" name="nombre_desarrolladora">
                <option value="<?php  echo $juego["nombre_desarrolladora"] ?>" selected>
                    <?php echo $juego["nombre_desarrolladora"] ?>
                </option>
                <?php foreach($desarrolladoras as $desarrolladora){ ?>
                    <option value="<?php echo $desarrolladora ?>">
                        <?php echo $desarrolladora ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Año de lanzamiento</label>
            <input class="form-control" type="text" name="anno_lanzamiento" value="<?php echo $juego["anno_lanzamiento"] ?>">
        </div> 
        <div class="mb-3">
            <label class="form-label">Reseñas de Steam</label>
            <input class="form-control" type="text" name="resennas" value="<?php echo $juego["resennas"] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Duración del videojuego</label>
            <input class="form-control" type="text" name="horas_duracion" value="<?php echo $juego["horas_duracion"] ?>">
        </div> 
        <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="CONFIRMAR CAMBIOS">
            <a class="btn btn-secondary" href="inicio.php">Volver</a>
        </div>
        <input type="hidden" name="id_videojuego" value="<?php echo $juego["id_videojuego"] ?>">
                <!--Cuando el formulario de edición es enviado para actualizar los datos del videojuego, utilizamos el método POST. 
                Esto significa que los datos enviados desde el formulario (como el id_videojuego) 
                estarán disponibles en el array superglobal $_POST.
                -->
    </form>
</body>
</html>