<?php
    require "conexion_pdo.php";

    //update desarrolladora

    echo "<h2> update datos de desarrolladoras </h2>";

    try {
        $consulta = $_conexion->prepare("UPDATE desarrolladoras SET ciudad = :c, anno_fundacion = :a WHERE nombre_desarrolladora = :nom");

        $consulta -> execute([
            "c" => "nippon uwu",
            "a" => 11111,
            "nom" => "Nintendo"
        ]);
        echo "desarrolladora updateada bien y tal";

    } catch (PDOException $e) {
        echo "ERROR: no se puede recuperar la consulta " . $e -> getMessage();
    }


?>