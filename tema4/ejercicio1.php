<?php

    // if ($_SERVER["REQUEST_METHOD"]=='GET') {
        
    // }
    if ($_SERVER["REQUEST_METHOD"]=='GET') {
            $nombre = $_GET['nombre'];
            $edad = $_GET['edad'];
            echo("El nombre introducido es $nombre y el apellido $edad");
    }
?>