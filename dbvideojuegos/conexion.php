<?php

    $_servidor = "localhost";
    $_usuario = "admin";
    $_pass = "pass1234";
    $_DBName = "videojuegos_bd";

    $_conexion = new mysqli($_servidor,$_usuario,$_pass,$_DBName);

    if ($_conexion->connect_error) {
        die("error de conexion: " . $_conexion->connect_error);
    }

    //$_conexion -> close();
?>