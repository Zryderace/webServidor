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
    $consulta = "SELECT * FROM desarrolladoras ORDER BY nombre_desarrolladora";
    $resultado = $_conexion->query($consulta);
    $desarrolladoras = [];
    while ($fila = $resultado->fetch_assoc()) {
        array_push($desarrolladoras, $fila["nombre_desarrolladora"]);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["titulo"])) $titulo = $_POST["titulo"];
        else $titulo = "";
        if (isset($_POST["nombre_desarrolladora"])) $nombre_desarrolladora = $_POST["nombre_desarrolladora"];
        else $nombre_desarrolladora = "";
        if (isset($_POST["anno_lanzamiento"])) $anno_lanzamiento = $_POST["anno_lanzamiento"];
        else $anno_lanzamiento = "";
        if (isset($_POST["porcentaje_reseñas"])) $porcentaje_reseñas = $_POST["porcentaje_reseñas"];
        else $porcentaje_reseñas = "";
        if (isset($_POST["horas_duracion"])) $horas_duracion = $_POST["horas_duracion"];
        else $horas_duracion = "";

        $arrayEmpresas = ["CD Project Red","Rockstar Games","FromSoftware","Valve","Nintendo","Square Enix"];

        $err_Titulo; $err_nombreDesarrolladora; $err_annoLanzamiento; $err_porcentajeReseñas; $err_horasDuracion;

        $consulta = "INSERT INTO videojuegos 
            (
                titulo,
                nombre_desarrolladora,
                anno_lanzamiento,
                porcentaje_reseñas,
                horas_duracion
            )
            VALUES (
                '$titulo',
                '$nombre_desarrolladora',
                $anno_lanzamiento,
                $porcentaje_reseñas,
                $horas_duracion
            )";

        // if ($temp_edad == "") {
        //     $err_edad = "no has introducido edad";
        // } else {
        //     $temp_edad = filter_var($temp_edad, FILTER_SANITIZE_NUMBER_INT);
        //     if (!filter_var($temp_edad, FILTER_VALIDATE_INT)) {
        //         $err_edad = "elige una edad valida";
        //     } elseif ($temp_edad < 0) {
        //         $err_edad = "la edad no puede ser menor a cero";
        //     } else {
        //         $edad = $temp_edad;
        //     }
        // }

        //titulo
        if ($titulo=="") {
            $err_Titulo = "titulo no puede estar vacio";
        }


        //nombre
        if ($nombre_desarrolladora=="") {
            $err_nombreDesarrolladora = "nombre desarrolladora no puede estar vacio";
        } else if (!in_array($nombre_desarrolladora,$arrayEmpresas)) {
            $nombre_desarrolladora = "";
            $err_nombreDesarrolladora = "elige una desarrolladora valida";
        }
        

        //anno lanzamiento
        if (!filter_var(filter_var($anno_lanzamiento,FILTER_SANITIZE_NUMBER_INT),FILTER_VALIDATE_INT)) {
            $anno_lanzamiento = "";
            $err_annoLanzamiento = "introduce un año valido";
        } else if ($anno_lanzamiento<1975||$anno_lanzamiento>2025) {
            $anno_lanzamiento = "";
            $err_annoLanzamiento = "el ano es demasiado pequeño o grande";
        }

        //porcentaje reseñas
        //reseñas puede ser vacio
        if ($porcentaje_reseñas=="") {
            $porcentaje_reseñas = NULL;
        }else if (!filter_var(filter_var($porcentaje_reseñas,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION),FILTER_VALIDATE_FLOAT)) {
            $porcentaje_reseñas = "";
            $err_porcentajeReseñas = "introduce un numero valido";
        } else if ($porcentaje_reseñas<0) {
            $porcentaje_reseñas = "";
            $err_porcentajeReseñas = "las reseñas no pueden ser negativas";
        }
        
        //horas duracion

        if (!filter_var(filter_var($horas_duracion,FILTER_SANITIZE_NUMBER_INT),FILTER_VALIDATE_INT)) {
            $horas_duracion = "";
            $err_horasDuracion = "introduce unas horas validas";
        } else if ($horas_duracion<-1) {
            $horas_duracion = "";
            $err_horasDuracion = "las horas no pueden ser negativas";
        }        



        if ($titulo != "" && $nombre_desarrolladora != "" && $anno_lanzamiento != "" && $porcentaje_reseñas != "" && $horas_duracion != "") {
            $_conexion->query($consulta);
        } else {
            //mensajito de error
        }
    }

    // print_r($desarrolladoras)

    ?>

    <form action="" method="post">
        <label for="titulo">titulo</label>
        <input type="text" name="titulo"> <?php echo isset($err_Titulo) ? "<p style='color:red;'>$err_Titulo</p>" : "" ?>
        <select name="nombre_desarrolladora" id=""> 
            <option value="" selected disabled>Elige desarrolladora</option>
            <?php
            foreach ($desarrolladoras as $desarrolladora) {
                echo "<option value=\"$desarrolladora\">$desarrolladora</option>";
            }
            ?>
            <!-- <option value=""></option>
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
            <option value=""></option> -->

        </select><?php echo isset($err_nombreDesarrolladora) ? "<p style='color:red;'>$err_nombreDesarrolladora</p>" : "" ?>
        <br>
        <label for="anno_lanzamiento">Lanzamiento</label> 
        <input type="text" name="anno_lanzamiento"><?php echo isset($err_annoLanzamiento) ? "<p style='color:red;'>$err_annoLanzamiento</p>" : "" ?>
        <br>
        <label for="porcentaje_reseñas">Reseñas</label> 
        <input type="text" name="porcentaje_reseñas"><?php echo isset($err_porcentajeReseñas) ? "<p style='color:red;'>$err_porcentajeReseñas</p>" : "" ?>
        <br>
        <label for="horas_duracion">duracion</label> 
        <input type="text" name="horas_duracion"><?php echo isset($err_horasDuracion) ? "<p style='color:red;'>$err_horasDuracion</p>" : "" ?>
        <br>
        <button type="submit">enviar</button>
    </form>






</body>

</html>