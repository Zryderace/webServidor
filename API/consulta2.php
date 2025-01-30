<?php
    require "conexion_pdo.php";

    //consulta sencilla PREPARE Y EXECUTE todos los datos de desarrolladoras

    echo "<h2> recuperacion de datos de desarrolladoras con PREPARE() Y EXECUTE() </h2>";

    try {

        $consulta = $_conexion->prepare("SELECT * FROM desarrolladoras WHERE nombre_desarrolladora = :nombre");

        //manda la consulta con el parametro dinamico
        //si se puede 1, si no 0
        $consulta -> execute(["nombre"=>"Valve"]);

        //siguiente fila, si no hy nada, false
        $fila = $consulta->fetch();

        if ($fila) {
            echo("bombita <br>");
            echo "desarrolladoras: " . $fila["nombre_desarrolladora"] . " ciudad: " . $fila["ciudad"] . "año fundacion: " . $fila["anno_fundacion"];
        }else {
            echo("no hay datos <br>");
        }

    } catch (PDOException $e) {
        echo "ERROR: no se puede recuperar la consulta " . $e -> getMessage();
    }


?>