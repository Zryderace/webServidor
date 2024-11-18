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
            if(isset($_POST["descuento"])) $temp_descuento = $_POST["descuento"];
            else $temp_descuento = "";

            // $temp_precio = $_POST["precio"];
            // if (filter_var($temp_precio, FILTER_SANITIZE_NUMBER_FLOAT) == false) {
            //     $resPrecio = "<span class='error'> el valor ingresado no es un mail </span>";
            // } else {
            //     $resPrecio = "<span class='acierto'> el valor ingresado es un mail </span>";
            // }
            
            //validacion del precio
            if($temp_precio == ""){
                $err_precio = "<span class='error'>el precio es obligatorio</span>";
            }else{
                //SANETIZADO Y COMPROBADO
                $temp_precio = filter_var($temp_precio, FILTER_SANITIZE_NUMBER_FLOAT);
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

            //validacion del descuento
            if($temp_descuento == ""){
                $err_descuento = "<span class='error'>Elige una opción</span>";
            }else if(!filter_var($temp_descuento, FILTER_VALIDATE_INT)){
                $err_descuento = "<span class='error'>Elige un descuento valido</span>";        
            }else{
                //SANETIZADO
                $temp_descuento = filter_var($temp_descuento, FILTER_SANITIZE_NUMBER_FLOAT);
                $descuento_validos = ["10", "20", "30"];
                if(!in_array($temp_descuento, $descuento_validos)){
                    $err_descuento = "<span class='error'>El descuento no esta en la lista</span>";        
                }else{
                    $descuento = $temp_descuento;
                }
            }
            
        }
    ?>
    <form action="" method="post">
        <label for="precio">Introduzca el precio</label>
        <input type="text" name="precio">
        <?php echo isset($err_precio) ? $err_precio : ""?>
        <br>
        <label for="descuento">Introduzca el descuento</label>
        <select name="descuento">
            <option disabled selected hidden>---- Elegir Discount ------</option>
            <option value="10">10%</option>
            <option value="20">20%</option>
            <option value="30">30%</option>
        </select>
        <?php echo isset($err_descuento) ? $err_descuento : ""?>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if(isset($descuento, $precio)){
            $precio_final = calcularDescuento($precio, $descuento);
            echo "<h3 class='acierto'> El precio con el descuento aplicado es $precio_final";
        }
    ?>
</body>
</html>
