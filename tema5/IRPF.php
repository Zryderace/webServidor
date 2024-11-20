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
    <!-- 
    -------------IRPF----------------
    
--Formulario de Entrada

        El formulario pide al usuario que ingrese su salario bruto en el campo salario.
        Al presionar el botón se debe de procesar el salario bruto en neto
        
        --Inicialización de Variables y Tramos de Impuesto

        El salario bruto ingresado se almacena en $salario.
        Se inicializa $salario_final como null, ya que esta variable contendrá el resultado del cálculo de salario neto.
        Los tramos de IRPF son porcentajes aplicados sobre rangos específicos de ingresos. Cada tramo se calcula como:
        Tramo 1: El 19% de los primeros 12,450 euros.
        Tramo 2: El 24% sobre los ingresos entre 12,450 y 20,200 euros.
        Tramo 3: El 30% sobre los ingresos entre 20,200 y 35,200 euros.
        Tramo 4: El 37% sobre los ingresos entre 35,200 y 60,000 euros.
        Tramo 5: El 45% sobre los ingresos entre 60,000 y 300,000 euros.

        -- IMPORTANTE
        Antes de realizar los calculos sobre el salario, se debe de validar la varible que nos llega desde el formulario, corroborando que es un número decimal (25674.04 por ejemplo)
     
-->

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if ($_POST["form"]=="ej1") {
                //ESTO HACE FALTA EN LISTAS PARA ELEGIR
                if(isset($_POST["bruto"])) $temp_bruto = $_POST["bruto"];
                else $temp_bruto = "";
                
                //validar
                if($temp_bruto == ""){
                    $err_bruto = "<span class='error'>el bruto es obligatorio</span>";
                }else{
                    //SANETIZADO Y COMPROBADO
                    $temp_bruto = filter_var($temp_bruto, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    if(!filter_var($temp_bruto, FILTER_VALIDATE_FLOAT)){
                        $err_bruto = "<span class='error'>mete un numero decimal</span>";
                    }else{
                        if($temp_bruto <= 0){
                            $err_bruto = "<span class='error'>el precio no puede ser negativo</span>";
                        }else{
                            $bruto = $temp_bruto;
                        }
                    }
                }

                $final = null;

                $tramo1 = 12450 * 0.19;
                $tramo2 = (20200-12450) * 0.24;
                $tramo3 = (35200-20200) * 0.3;
                $tramo4 = (60000-35200) * 0.37;
                $tramo5 = (300000-60000) * 0.45;

                if (isset($bruto)) {
                    if ($salario<12450) {
                        $final = $bruto - $tramo1;
                    } elseif ($salario < 20200) {
                        $final = $bruto - $tramo1 - $tramo2;
                    } elseif ($salario < 35200) {
                        $final = $bruto - $tramo1 - $tramo2 - $tramo3;
                    } elseif ($salario<=12450 && $salario < 20200) {
                        $final = $bruto - $tramo1 - $tramo2;
                    }
                }
                

            }
        }
    ?>

    <form action="" method="post">
        <input type="hidden" name="form" value="ej1">
        <label for="postal">Introduzca el salario bruto</label>
        <input type="text" name="bruto">
        <br>
        <input type="submit" value="Enviar">
    </form>




</body>

</html>