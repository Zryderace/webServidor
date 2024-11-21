<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);

        require("funciones.php");
    ?>
</head>
<body>
    <form action="" method="post">  
        <input type="hidden" name="form" value="ej1">
        <label for="postal">Introduzca el nombre</label>
        <input type="text" name="nombre">
        <input type="text" name="edad">
        <br>
        <input type="submit" value="Enviar">
    </form>
    <!--
    
    formulario dos valores nombre edad
    
    <18 -> $nombre es menor
    >=18 <=65 $nombre es mayor de edad
    >65 $nombre esta jubilado
    
    usar MATCH

    sanear nombre con trim y replace_match()
    sanear en funcion DEPURAR

    validar edad
    
    preg_replace("",REEMPLAZO,$var)



    -->
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if ($_POST["form"]=="ej1") {

                if (isset($_POST["nombre"])) {
                    $nombre = sanear($_POST["nombre"]);
                } else {
                    $nombre = "";
                }
                
                if (isset($_POST["edad"])) {
                    $edad = validar($_POST["edad"]);
                } else {
                    $edad = "";
                }
                
                //esto retorna boolean o string

                if (is_int($edad)) {
                    echo "tu edad es $edad";
                    echo "<br> tu nombre es $nombre";
                } else {
                    echo $edad;
                }

                


            }
        }
    ?>
</body>
</html>