<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require("funciones.php");
    ?>
</head>

<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["form"] == "ej1") {

            if (isset($_POST["figura"])) $temp_figura = $_POST["figura"];
            else $temp_figura = "";

            if (isset($_POST["nombre"])) $temp_nombre = $_POST["nombre"];
            else $temp_nombre = "";

            if (isset($_POST["lado"])) $temp_lado = $_POST["lado"];
            else $temp_lado = "";

            if (isset($_POST["radio"])) $temp_radio = $_POST["radio"];
            else $temp_radio = "";

            if (isset($_POST["base"])) $temp_base = $_POST["base"];
            else $temp_base = "";

            if (isset($_POST["altura"])) $temp_altura = $_POST["altura"];
            else $temp_altura = "";

            $arrayFiguras = ["cuadrado", "circulo", "triangulo"];

            //sanetizar nombre para que no se pueda meter codigo
            //quitar espacias al principio y al final

            if ($temp_nombre=="") {
                $err_nombre = "no has introducido nombre";
            } else {
                $temp_nombre = htmlspecialchars($temp_nombre);
                $temp_nombre = trim($temp_nombre);
                $nombre = $temp_nombre;
            }

            

            //primero comprabar que figura este bien antes de nada
            // echo ($temp_figura);
            if (!in_array($temp_figura, $arrayFiguras)) {
                $err_figura = "has introducido una figura incorrecta";
            } else {
                //sanetizar y validar solo en el caso que lo necesitemos
                //para cada figura

                $figura = $temp_figura;

                //ver que figura tenemos

                if ($figura == $arrayFiguras[0]) {
                    # cuadrado usa lado
                    if ($temp_lado == "") {
                        $err_lado = "<span class='error'>el lado es obligatorio en el cuadrado</span>";
                    } else {
                        //SANETIZADO Y COMPROBADO
                        $temp_lado = filter_var($temp_lado, FILTER_SANITIZE_NUMBER_FLOAT);
                        if (!filter_var($temp_lado, FILTER_VALIDATE_FLOAT)) {
                            $err_lado = "<span class='error'>mete un numero decimal</span>";
                        } else {
                            if ($temp_lado <= 0) {
                                $err_lado = "<span class='error'>el lado no puede ser negativo</span>";
                            } else {
                                $lado = $temp_lado;
                            }
                        }
                    }
                } else if ($figura == $arrayFiguras[1]) {
                    # circulo usa radio
                    if ($temp_radio == "") {
                        $err_radio = "<span class='error'>el radio es obligatorio en el circulo</span>";
                    } else {
                        //SANETIZADO Y COMPROBADO
                        $temp_radio = filter_var($temp_radio, FILTER_SANITIZE_NUMBER_FLOAT);
                        if (!filter_var($temp_radio, FILTER_VALIDATE_FLOAT)) {
                            $err_radio = "<span class='error'>mete un numero decimal</span>";
                        } else {
                            if ($temp_radio <= 0) {
                                $err_radio = "<span class='error'>el radio no puede ser negativo</span>";
                            } else {
                                $radio = $temp_radio;
                            }
                        }
                    }
                } else if ($figura == $arrayFiguras[2]) {
                    # triangulo usa base Y altura

                    # base

                    if ($temp_base == "") {
                        $err_base = "<span class='error'>la base es obligatorio para triangulo</span>";
                    } else {
                        //SANETIZADO Y COMPROBADO
                        $temp_base = filter_var($temp_base, FILTER_SANITIZE_NUMBER_FLOAT);
                        if (!filter_var($temp_base, FILTER_VALIDATE_FLOAT)) {
                            $err_base = "<span class='error'>mete un numero decimal</span>";
                        } else {
                            if ($temp_base <= 0) {
                                $err_base = "<span class='error'>la base no puede ser negativo</span>";
                            } else {
                                $base = $temp_base;
                            }
                        }
                    }

                    #altura

                    if ($temp_altura == "") {
                        $err_altura = "<span class='error'>la altura es obligatorio para el triangulo</span>";
                    } else {
                        //SANETIZADO Y COMPROBADO
                        $temp_altura = filter_var($temp_altura, FILTER_SANITIZE_NUMBER_FLOAT);
                        if (!filter_var($temp_altura, FILTER_VALIDATE_FLOAT)) {
                            $err_altura = "<span class='error'>mete un numero decimal</span>";
                        } else {
                            if ($temp_altura <= 0) {
                                $err_altura = "<span class='error'>el altura no puede ser negativo</span>";
                            } else {
                                $altura = $temp_altura;
                            }
                        }
                    }
                }
            }

            //aqui deberia estar todo bien

            //hacer isset de cada elemento y pasarlo todo
            //si alguna no esta seteado porque no cumple los requisitos
            //se pone en vacio para poder usar la misma funcion
            //en la propia funcion se comprobara que tiene que hacer

            if (!isset($figura)) $figura = "";
            if (!isset($radio)) $radio = "";
            if (!isset($lado)) $lado = "";
            if (!isset($base)) $base = "";
            if (!isset($altura)) $altura = "";

            #order: figura lado radio base altura

            $area = calcularArea($figura,$lado,$radio,$base,$altura);

        }
    }
    ?>

    <form action="" method="post">
        <input type="hidden" name="form" value="ej1">
        <select name="figura">
            <option disabled selected hidden>---- Elegir Figura ------</option>
            <option value="cuadrado">Cuadrado</option>
            <option value="circulo">Circulo</option>
            <option value="triangulo">Triangulo</option>
            <!-- <option value="hola">error</option> -->
        </select>
        <br>
        <?php echo isset($err_figura) ? "<p style='color:red;'>$err_figura</p> <br>" : "" ?>
        <label for="nombre">Introduzca el nombre</label>
        <input type="text" name="nombre">
        <br>
        <?php echo isset($err_nombre) ? "<p style='color:red;'>$err_nombre</p> <br>" : "" ?>
        <label for="lado">Introduzca el lado del cuadrado</label>
        <input type="text" name="lado">
        <br>
        <?php echo isset($err_lado) ? "<p style='color:red;'>$err_lado</p> <br>" : "" ?>
        <label for="radio">Introduzca el radio del circulo</label>
        <input type="text" name="radio">
        <br>
        <?php echo isset($err_radio) ? "<p style='color:red;'>$err_radio</p> <br>" : "" ?>
        <label for="base">Introduzca la base del triangulo</label>
        <input type="text" name="base">
        <br>
        <?php echo isset($err_base) ? "<p style='color:red;'>$err_base</p> <br>" : "" ?>
        <label for="altura">Introduzca la altura del triangulo</label>
        <input type="text" name="altura">
        <br>
        <?php echo isset($err_altura) ? "<p style='color:red;'>$err_altura</p> <br>" : "" ?>
        <input type="submit" value="Enviar">

    </form>

    

    <?php
        echo isset($area) ? "<h3 style='color:green;'>$area</h3> <br>" : "";
        echo isset($nombre) ? "tu nombre es <h5 style='color:green;>$nombre</h5> <br>" : "";
        echo isset($nombre) ? "has introducido <h5 style='color:green;><pre>$nombre</pre></h5> <br>" : "";
    ?>


</body>

</html>