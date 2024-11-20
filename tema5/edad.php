<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <input type="hidden" name="form" value="ej1">
        <label for="postal">Introduzca el pass</label>
        <input type="text" name="pass">
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
                $variable = $_POST["pass"];
                preg_replace("//"," ",$variable);
            }
        }
    ?>
</body>
</html>