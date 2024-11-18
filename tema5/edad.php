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
        
        --Cálculo del Salario Neto por Tramos

        Dependiendo del salario ingresado, se calcula el salario neto aplicando los tramos correspondientes.
        Cada if o elseif evalúa si el salario está en un determinado rango:
        Primer Tramo (0 a 12,450 euros): Si el salario está en este rango, se le resta el 19%.
        Segundo Tramo (12,450 a 20,200 euros): Si el salario está en este rango, se le resta el 19% para los primeros 12,450 euros, y luego el 24% para la diferencia entre el salario y 12,450.
        Tercer Tramo (20,200 a 35,200 euros): Además de los tramos anteriores, se resta el 30% para la diferencia entre el salario y 20,200.
        Cuarto Tramo (35,200 a 60,000 euros): Además de los tramos anteriores, se resta el 37% para la diferencia entre el salario y 35,200.
        Quinto Tramo (60,000 a 300,000 euros): Se resta el 45% para la diferencia entre el salario y 60,000.
        Sexto Tramo (más de 300,000 euros): Para salarios superiores a 300,000, se aplica además el 47% para el excedente.

        -- IMPORTANTE
        Antes de realizar los calculos sobre el salario, se debe de validar la varible que nos llega desde el formulario, corroborando que es un número decimal (25674.04 por ejemplo)
     



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