<?php

    $_servidor = "localhost";
    $_usuario = "admin";
    $_pass = "pass1234";
    $_DBName = "cine";

    $_conexion = new mysqli($_servidor,$_usuario,$_pass,$_DBName);

    if ($_conexion->connect_error) {
        die("error de conexion: " . $_conexion->connect_error);
    }

    echo "te has conectado a la base de datos $_DBName <br>";

    //sacar info del host, protocol version, info server

    echo $_conexion->host_info . "<br>";
    echo $_conexion->protocol_version . "<br>";
    echo $_conexion->server_info . "<br>";

    $_tabla = $_conexion -> query("SELECT * FROM cine");

    //fetch_assoc() se utiliza para obtener una fila de un conjunto de resultado como un array asociativo
    //              cada columna de la fila se almacena en el array asociativo utilizando el nombre de la columna como clave

    if ($_tabla->num_rows > 0) {
        while ($fila = $_tabla->fetch_assoc()) {
            echo "nombre productora: " . $fila["nombre_productora"];
            echo " - ciudad: " . $fila["ciudad"];
            echo " - año fundacion: " . $fila["anio_fundacion"]."<br>";
        }
    } else {
        echo "no se han encontrado datos";
    }
    

    











    $_conexion -> close();


?>