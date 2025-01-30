<?php
    require "conexion_pdo.php";

    //nueva desarrolladora

    echo "<h2> transacciones </h2>";

    try {

        //iniciamos transaccion
        $_conexion->beginTransaction();

        $consulta = $_conexion->prepare("INSERT INTO desarrolladoras (nombre_desarrolladora, ciudad, anno_fundacion) VALUES (?, ?, ?)");

        $consulta -> execute(["DAW1","ejemplo1", 2025]);
        $consulta -> execute(["DAW2","ejemplo2", 0000]);
        $consulta -> execute(["DAW3","ejemplo3", 1000]);
        echo "desarrolladora insertada bien y tal";
        $_conexion -> commit();
    } catch (PDOException $e) {
        $_conexion->rollBack();
        echo "ERROR: no se puede recuperar la consulta " . $e -> getMessage();
    }


?>