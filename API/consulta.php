<?php
    require "conexion_pdo.php";

    //consulta sencilla query() todos los datos de desarrolladoras

    echo "<h2> recuperacion de datos de desarrolladoras </h2>";

    try {
        $res = $_conexion->query("SELECT * FROM desarrolladoras");

        while($fila = $res->fetch()){
            echo "desarrolladores: " . $fila["nombre_desarrolladora"] . " ciudad: " . $fila["ciudad"] . "año fundacion: " . $fila["anno_fundacion"];
        
        }

        //segunda vuelta pero no esta bien
        foreach ($res as $filas) {
            echo "desarrolladores: " . $fila["nombre_desarrolladora"] . " ciudad: " . $fila["ciudad"] . "año fundacion: " . $fila["anno_fundacion"];
        }



    } catch (PDOException $e) {
        echo "ERROR: no se puede recuperar la consulta " . $e -> getMessage();
    }


?>