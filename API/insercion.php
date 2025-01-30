<?php
    require "conexion_pdo.php";

    //nueva desarrolladora

    echo "<h2> meter datos de desarrolladoras </h2>";

    try {
        $consulta = $_conexion->prepare("INSERT INTO desarrolladoras (nombre_desarrolladora, ciudad, anno_fundacion) VALUES (:n, :c, :a)");

        $consulta -> execute([
            "n" => "nombreEjemplo",
            "c" => "ciudadEjemplo",
            "a" => 2015
        ]);
        echo "desarrolladora insertada bien y tal";

    } catch (PDOException $e) {
        echo "ERROR: no se puede recuperar la consulta " . $e -> getMessage();
    }


?>