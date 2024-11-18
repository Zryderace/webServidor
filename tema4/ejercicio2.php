<?php
    // if ($_SERVER["REQUEST_METHOD"]=='GET') {
        
    // }
    if ($_SERVER["REQUEST_METHOD"]=='POST') {
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $correo = $_POST['correo'];
        echo("El nombre introducido es $nombre y la edad $edad, correo: $correo");
    }   
?>