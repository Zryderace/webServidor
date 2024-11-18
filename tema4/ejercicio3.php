<?php
    if ($_SERVER["REQUEST_METHOD"]=='POST') {
    $texto = $_POST['texto'];
    echo("Texto introducido: <br> $texto");
    }
?>