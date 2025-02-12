<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);
    ?>
</head>
<body>

    <h1>Ejercicio 2</h1>
    <!-- En el fichero detalle_pokemon.php, mostrar la información básica del pokémon (altura, peso y tipo),
    mostrar la imagen de frente del pokemito y listar sus tipos dentro de una lista
     (es decir, en cada línea de la lista, un tipo diferente, si tiene un solo tipo sólo aparecerá una línea) -->
    
    <?php
        //recojer pokemon
        $apiURL = "https://pokeapi.co/api/v2/pokemon/";
        $pokemon = $_GET["name"];

        $apiURL .= $pokemon;
        
        echo($apiURL . "<br>");

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $apiURL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($curl);

        curl_close($curl);

        $datos = json_decode($res,true);
        
        $altura = $datos["height"];
        $peso = $datos["weight"];
        $tipo = $datos["types"];
        $foto = $datos["sprites"]["front_default"];

        echo("altura: ".$altura . "<br>");
        echo("peso: ".$peso. "<br>");
        echo("tipo: ".$tipo[0]["type"]["name"]. "<br>");
        if (isset($tipo[1]["type"]["name"])) {
            echo("segundo tipo: ".$tipo[1]["type"]["name"]. "<br>");
        }
        echo("sprite: <img src='$foto'> <br>");
        
        
        
    ?>

</body>
</html>