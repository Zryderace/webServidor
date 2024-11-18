<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vulnerabilidad</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="comentario">
        <input type="submit" value="enviar">
    </form>
    <form action="" method="GET">
        <input type="text" name="comentario">
        <input type="submit" value="enviar">
    </form>
</body>
</html>

<?php
    //<script>alert(`Has sido hackeado UwU`);document.body.innerHTML = "<h1>Sitio hackeado</h1>";</script>
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $comentario = $_POST["comentario"];
        echo $comentario;
    }
    //seguro
    if ($_SERVER["REQUEST_METHOD"]=="GET") {
        $comentario = htmlspecialchars($_GET["comentario"],ENT_QUOTES,'UTF-8');
        echo $comentario;
    }
?>