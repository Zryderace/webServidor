<?php
    require "conexion_pdo.php";

    //delete desarrolladora

    echo "<h2> delete de desarrolladoras </h2>";

    try {
        $consulta = $_conexion->prepare("DELETE FROM desarrolladoras WHERE nombre_desarrolladora = :n");

        $consulta -> execute([
            "n" => "nombreEjemplo"
        ]);
        echo "desarrolladora borrada bien y tal";

    } catch (PDOException $e) {
        echo "ERROR: no se puede recuperar la consulta " . $e -> getMessage();
    }


?>