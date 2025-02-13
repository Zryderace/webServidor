<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>

<body>
    <?php

    //50 primeras cadenas de evolucion
    //numerar cadenas y luego sacar pokemon de cada cadena
    //https://pokeapi.co/api/v2/evolution-chain/?limit=50

    //recorre cada chain
    for ($i = 1; $i <= 50; $i++) {
        $url = "https://pokeapi.co/api/v2/evolution-chain/$i/";

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($curl);

        $datos = json_decode($res, true);

        curl_close($curl);

        //primera //segunda //tercera
        //pathing para cada una, comprobar si existe
        
        // var_dump($datos["chain"]["species"]["name"]);
        // var_dump($datos["chain"]["evolves_to"]["0"]["species"]["name"]);
        // var_dump($datos["chain"]["evolves_to"]["0"]["evolves_to"]["0"]["species"]["name"]);

        echo("<h3>Cadena $i </h3>");
        echo("Primera evolucion: ".$datos["chain"]["species"]["name"]."<br>");
        if (isset($datos["chain"]["evolves_to"]["0"]["species"]["name"])) {
            echo("Segunda evolucion: ". $datos["chain"]["evolves_to"]["0"]["species"]["name"] . "<br>");
        } else {
            echo("no tiene segunda evo");
        }
        if (isset($datos["chain"]["evolves_to"]["0"]["evolves_to"]["0"]["species"]["name"])) {
            echo("Tercera evolucion: " . $datos["chain"]["evolves_to"]["0"]["evolves_to"]["0"]["species"]["name"]);
        } else {
            echo("no tiene tercera evo");
        }
    }





    

    ?>
</body>

</html>