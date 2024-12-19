<?php

    $_servidor = "localhost";
    $_usuario = "admin";
    $_pass = "pass1234";
    $_DBName = "videojuegos_bd";

    $_conexion = new mysqli($_servidor,$_usuario,$_pass,$_DBName);

    if ($_conexion->connect_error) {
        die("error de conexion: " . $_conexion->connect_error);
    }

    echo "te has conectado a la base de datos $_DBName <br>";

    //sacar info del host, protocol version, info server

    // echo $_conexion->host_info . "<br>";
    // echo $_conexion->protocol_version . "<br>";
    // echo $_conexion->server_info . "<br>";

    $_tabla = $_conexion -> query("SELECT * FROM videojuegos");

    // //fetch_assoc() se utiliza para obtener una fila de un conjunto de resultado como un array asociativo
    // //              cada columna de la fila se almacena en el array asociativo utilizando el nombre de la columna como clave

    // if ($_tabla->num_rows > 0) {
    //     while ($fila = $_tabla->fetch_assoc()) {
    //         echo "nombre productora: " . $fila["nombre_productora"];
    //         echo " - ciudad: " . $fila["ciudad"];
    //         echo " - año fundacion: " . $fila["anio_fundacion"]."<br>";
    //     }
    // } else {
    //     echo "no se han encontrado datos";
    // }
    
    if ($_tabla->num_rows > 0) {
        echo "<table>";
        while ($fila = $_tabla->fetch_assoc()) {
            // echo "nombre productora: " . $fila["nombre_productora"];
            echo "<tr >";
            if ($fila["horas_duracion"]<0) {
                echo "<td >juego como servicio: </td>". "<td>". $fila["titulo"]."</td> <br>";
            } else {
                echo "<td>el juego " .$fila["titulo"]. "</td> <td>dura " . $fila["horas_duracion"] . " </td> <br>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "no se han encontrado datos";
    }
    











    $_conexion -> close();


?>