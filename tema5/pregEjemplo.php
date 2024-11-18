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
        <label for="telefono">Introduzca el telefono</label>
        <input type="text" name="telefono">
        <br>
        <input type="submit" value="Enviar">
    </form>
    
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if ($_POST["form"]=="ej1") {
                $tel = $_POST["telefono"];
                //que sea digito y tenga 9 /\d{9}$/
                // el $hace que no haya nada detras, por lo cual lo limita
                //
                if (preg_match("/\d{9}$/",$tel)) {
                    echo "el telefono es valido <br>";
                } else {
                    echo "el teneofno no es valido <br>";
                }
                
            }
        }
    ?>

    <form action="" method="post">
        <input type="hidden" name="form" value="ej2">
        <label for="postal">Introduzca el codigo postal</label>
        <input type="text" name="postal">
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if ($_POST["form"]=="ej2") {
                $variable = $_POST["postal"];
                // ^ empieza por
                // [1-5] un numero del 1 al 5
                //
                //
                if (preg_match("/^[1-5]\d{4}$/",$variable)) {
                    echo "el postal es valido <br>";
                } else {
                    echo "el postal no es valido <br>";
                }
            }
        }
    ?>

<form action="" method="post">
        <input type="hidden" name="form" value="ej3">
        <label for="postal">Introduzca el usuario</label>
        <input type="text" name="usuario">
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if ($_POST["form"]=="ej3") {
                $variable = $_POST["usuario"];
                // 
                // usuario -> 3-15 caracteres, puede ser a-Z 0-9 - y _
                // 
                //
                //
                if (preg_match("/^[a-zA-Z0-9_-]{3,15}$/",$variable)) {
                    echo "el usuario es valido <br>";
                } else {
                    echo "el usuario no es valido <br>";
                }
            }
        }
    ?>

<form action="" method="post">
        <input type="hidden" name="form" value="ej4">
        <label for="postal">Introduzca el correo</label>
        <input type="text" name="correo">
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if ($_POST["form"]=="ej4") {
                $variable = $_POST["correo"];
                // 
                // correo
                // 
                //
                //
                if (preg_match("/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,6}$/",$variable)) {
                    echo "el correo es valido <br>";
                } else {
                    echo "el correo no es valido <br>";
                }
            }
        }
    ?>

<form action="" method="post">
        <input type="hidden" name="form" value="ej5">
        <label for="postal">Introduzca el pass</label>
        <input type="text" name="pass">
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if ($_POST["form"]=="ej5") {
                $variable = $_POST["pass"];
                // 
                // 
                // 
                //
                //
                if (preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/",$variable)) {
                    echo "el pass es valido <br>";
                } else {
                    echo "el pass no es valido <br>";
                }
            }
        }
    ?>
</body>
</html>