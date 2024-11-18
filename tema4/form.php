<?php

    // if ($_SERVER["REQUEST_METHOD"]=='GET') {
        
    // }
    if ($_SERVER["REQUEST_METHOD"]=='POST') {

        $id = $_POST['form'];

        if ($id=='ej1') {
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            echo("El nombre introducido es $nombre y el apellido $apellidos");
        }

        if ($id=='ej2') {
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $correo = $_POST['correo'];
            echo("El nombre introducido es $nombre, el apellido $apellidos y el correo $correo");    
        }

        if ($id=='ej3') {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $edad = $_POST['edad'];
            echo("El nombre introducido es $nombre y el correo $correo y la edad $edad");
        }
        
    }
    
    



?>