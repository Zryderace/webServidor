<?php

    if ($_SERVER["REQUEST_METHOD"]=='GET') {
        if ($_SERVER["REQUEST_METHOD"]=='GET') {
            $nombre = $_GET['nombre'];
            $edad = $_GET['edad'];
            echo("El nombre introducido es $nombre y la edad $edad");
        }
    }
    if ($_SERVER["REQUEST_METHOD"]=='POST') {

        $id = $_POST['form'];
        
        if ($id=='ej2') {
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $correo = $_POST['correo'];
            echo("El nombre introducido es $nombre y la edad $edad, correo: $correo");        }

        if ($id=='ej3') {
            $texto = $_POST['texto'];
            echo("Texto introducido: <br> $texto");
        }
        
    }
    
    



?>