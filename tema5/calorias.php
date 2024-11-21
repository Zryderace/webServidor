<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calorias</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);

        require("funciones.php");
    ?>
</head>
<body>
    <!--

    Formulario edad, pesoKG, alturaCM, genero H M, nivel actividad Sedentario Ligero Moderado Activo

    validar todos los campos, mostrar errores

    si todo pasa los filtros, mostrar debajo usando isset() el resultado de cuantas calorias debe consumir el usuario

    -->
    
    <form action="" method="post">  
        <input type="hidden" name="form" value="ej1">
        <label for="datos">Introduzca sus datos</label>
        <br>
        Edad <input type="text" name="edad">
        <br>
        Peso <input type="text" name="peso">
        <br>
        Altura <input type="text" name="altura">
        <br>
        <label for="mujer">Hombre</label>
        <input type="radio" name="genero" value="1">
        <label for="mujer">Mujer</label>
        <input type="radio" name="genero" value="0">
        <br>
        <select name="actividad">
            <option disabled selected hidden>---- Elegir Actividad ------</option>
            <option value="1">Sedentario</option>
            <option value="2">Ligero</option>
            <option value="3">Moderado</option>
            <option value="4">Activo</option>
        </select>
        <br>
        <input type="submit" value="Enviar">
    </form>
    

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if ($_POST["form"]=="ej1") {

                if(isset($_POST["edad"])) $temp_edad = $_POST["edad"];
                else $temp_edad = "";

                if(isset($_POST["peso"])) $temp_peso = $_POST["peso"];
                else $temp_peso = "";

                if(isset($_POST["altura"])) $temp_altura = $_POST["altura"];
                else $temp_altura = "";
                //entre 0 y 220

                if(isset($_POST["genero"])) $temp_genero = $_POST["genero"];
                else $temp_genero = "";

                //formula
                // masculino 88.36 + (13.4 * peso) + (4.8 * altura) - (5.7*edad)
                // femenino 44.76 + (9.2 * peso) + (3.1 * altura) - (4.3 * edad)

                // to do esto por 1.2 1.375 1.55 1.725

                if(isset($_POST["actividad"])) $temp_actividad = $_POST["actividad"];
                else $temp_actividad = "";

                if ($temp_edad=="") {
                    $err_edad = "no has introducido edad";
                } else {
                    $temp_edad = filter_var($temp_edad, FILTER_SANITIZE_NUMBER_INT);
                    if (!filter_var($temp_edad,FILTER_VALIDATE_INT)) {
                        $err_edad = "elige una edad valida";
                    } elseif ($temp_edad<0) {
                        $err_edad = "la edad no puede ser menor a cero";
                    } else {
                        $edad = $temp_edad;
                    }
                }


                if ($temp_peso=="") {
                    $err_peso = "no has introducido peso";
                } else {
                    $temp_peso = filter_var($temp_peso, FILTER_SANITIZE_NUMBER_FLOAT);
                    if (!filter_var($temp_peso,FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION)) {
                        $err_peso = "elige un peso valido";
                    } elseif ($temp_peso<=0) {
                        $err_peso = "peso no puede ser menor a cero";
                    } else {
                        $peso = $temp_peso;
                    }
                }


                if ($temp_altura=="") {
                    $err_altura = "no has introducido altura";
                } else {
                    $temp_altura = filter_var($temp_altura, FILTER_SANITIZE_NUMBER_INT);
                    if (!filter_var($temp_altura,FILTER_VALIDATE_INT)) {
                        $temp_altura = "elige una altura valida";
                    } elseif ($temp_altura<0) {
                        $err_altura = "la altura no puede ser menor a cero";
                    } elseif ($temp_altura>220){
                        $err_altura = "la altura no puede ser mayor a 220cm";
                    } else {
                        $altura = $temp_altura;
                    }
                }


                if ($temp_genero=="") {
                    $err_genero = "no has introducido genero";
                } else {
                    $arrayGenero = [0,1];
                    $temp_genero = filter_var($temp_genero, FILTER_SANITIZE_NUMBER_INT);
                    if (!filter_var($temp_genero,FILTER_VALIDATE_BOOL)) {
                        $err_genero = "elige un genero valido";
                    } elseif(!in_array($temp_genero,$arrayGenero)) {
                        $err_genero = "elige un genero valido (no esta en array)";
                    } else {
                        $genero = $temp_genero;
                    }
                }


                if ($temp_actividad=="") {
                    $err_actividad = "no has introducido actividad";
                } else {
                    $temp_actividad = filter_var($temp_actividad, FILTER_SANITIZE_NUMBER_INT);
                    $arrayActividades = [1,2,3,4,5];
                    if (!filter_var($temp_actividad,FILTER_VALIDATE_INT)) {
                        $err_actividad = "elige una actividad valida";
                    } elseif(!in_array($temp_actividad,$arrayActividades)) {
                        $err_actividad = "elige una actividad valida (no esta en array)";
                    } else {
                        $actividad = $temp_actividad;
                    }
                }

            }
        }
    ?>

    <?php echo isset($err_edad) ? "$err_edad <br>" : ""?>
    <?php echo isset($err_peso) ? "$err_peso <br>" : ""?>
    <?php echo isset($err_altura) ? "$err_altura <br>" : ""?>
    <?php echo isset($err_genero) ? "$err_genero <br>" : ""?>
    <?php echo isset($err_actividad) ? "$err_actividad <br>" : ""?>








</body>
</html>