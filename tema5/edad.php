<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edad</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        require "funciones.php";
    ?>
</head>
<body>

    <?php
        if($_SERVER["REQUEST_METHOD"]=="GET"){
            if(isset($_GET["nombre"])) $nombre = $_GET["nombre"];
            else $nombre = "";
            if(isset($_GET["edad"])) $edad = $_GET["edad"];
            else $edad = "";
            
            $nombre = sanear($nombre);
            $edad = validar($edad);
            echo "<pre>$nombre</pre>";
            echo $edad;
        }
        /*
    ---------------------------------EJERCICIO 1----------------------------------
    Crear un formulario que reciba dos valores: el nombre y la edad de una persona
    Si la persona tiene:
    < 18 años, se mostrará "X ES MENOR DE EDAD" siendo X el nombre de la persona
    entre 18 y 65, se mostrará "X ES MAYOR DE EDAD" 
    mayor de 65, se mostrará "X SE HA JUBILADO"

    hacer la logica de un MATCH

    sanead el nombre de la persona con htmlspecialchars(), trim y preg_replace()

    preg_match("/   /", $var)
    preg_replace("/   /", REEMPLAZO, $var)


    en una funcion que se llame "depurar($nombre)"
        sanead el nombre de la persona con trim y replace_match()

    y validar la EDAD 
*/
    ?>
    <form action="" method="get">
        <input type="text" name="nombre">
        <input type="text" name="edad">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>