<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{
            color: red;
        }
        .acierto{
            color: green;
        }
    </style>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);

        require("funciones.php");
    ?>
</head>
<body>
<?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $temp_precio = $_POST["precio"];
            if(isset($_POST["iva"])) $temp_iva = $_POST["iva"];
            else $temp_iva = "";

            
            //validacion del precio
            if($temp_precio == ""){
                $err_precio = "<span class='error'>el precio es obligatorio</span>";
            }else{
                //SANETIZADO Y COMPROBADO
                $temp_precio = filter_var($temp_precio, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                if(!filter_var($temp_precio, FILTER_VALIDATE_FLOAT)){
                    $err_precio = "<span class='error'>mete un numero decimal</span>";
                }else{
                    if($temp_precio <= 0){
                        $err_precio = "<span class='error'>el precio no puede ser negativo</span>";
                    }else{
                        $precio = $temp_precio;
                    }
                }
            }
            
            //validacion del iva
            if($temp_iva == ""){
                $err_iva = "<span class='error'>Elige una opción</span>";
            }else if(!filter_var($temp_iva, FILTER_VALIDATE_FLOAT)){
                $err_iva = "<span class='error'>Elige un iva valido</span>";        
            }else{
                //SANETIZADO
                $temp_iva = filter_var($temp_iva, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $iva_validos = ["1.21", "1.1", "1.04"];
                if(!in_array($temp_iva, $iva_validos)){
                    $err_iva = "<span class='error'>El iva no esta en la lista</span>";        
                }else{
                    $iva = $temp_iva;
                }
            }
            
        }
    ?>
    <form action="" method="post">
        <label for="precio">Introduzca el precio</label>
        <input type="text" name="precio">
        <?php echo isset($err_precio) ? $err_precio : ""?>
        <br>
        <label for="iva">Introduzca el iva</label>
        <select name="iva">
            <option disabled selected hidden>---- Elegir IVA ------</option>
            <option value="1.21">general</option>
            <option value="1.1">reducido</option>
            <option value="1.04">SUPER</option>
        </select>
        <?php echo isset($err_iva) ? $err_iva : ""?>
        <br>
        <input type="submit" value="Enviar">
        <?php
        if(isset($iva, $precio)){
            $precio_final = calcularIVA($precio, $iva);
            echo "<h3 class='acierto'> El precio con el iva aplicado es $precio_final";
        }
    ?>
    </form>
</body>
</html>