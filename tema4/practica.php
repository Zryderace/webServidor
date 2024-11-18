<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="practica.php" method="POST">
        <input type="hidden" name="form" value="ej1" />
        Palabra: <input required type="text" min="1" name="palabra" id="palabra" />
        <input type="submit" value="Enviar" />
    </form>
    <form action="" method="POST"> 

    </form>
    <br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {

        $id = $_POST['form'];

        if ($id == 'ej1') {
            $array1 = arrayAleatorio(3,3);
            $array2 = arrayAleatorio(3,3);

            $palabra = $_POST['palabra'];
        }
    }

    function arrayAleatorio($filas, $columnas){
        $array = [];
        for ($i=0; $i < $filas; $i++) { 
            for ($j=0; $j < $columnas; $j++) { 
                $array[$i][$j] = rand(1,100);
            }
        }
        return $array;
    }

    function menor($array1,$array2){
        $resultado = [];
        for ($i=0; $i < count($array1); $i++) { 
            for ($j=0; $j < count($array1[$i]); $j++) { 
                if ($array1[$i][$j]<=$array2[$i][$j]) {
                    $resultado[$i][$j] = $array1[$i][$j];
                } else {
                    $resultado[$i][$j] = $array2[$i][$j];
                }
            }
        }
        return $resultado;
    }

    function mayor($array1,$array2){
        $resultado = [];
        for ($i=0; $i < count($array1); $i++) { 
            for ($j=0; $j < count($array1[$i]); $j++) { 
                if ($array1[$i][$j]>=$array2[$i][$j]) {
                    $resultado[$i][$j] = $array1[$i][$j];
                } else {
                    $resultado[$i][$j] = $array2[$i][$j];
                }
            }
        }
        return $resultado;
    }


    ?>
</body>

</html>