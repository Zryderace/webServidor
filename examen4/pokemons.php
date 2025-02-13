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
    <h1>Nombre 50 primeros pokemon</h1>

    <?php
    //poner lo de los fallos
    //nombre de pokemon + sprite de frente
    //enlace debajo con "mas info" redirigiendo a infoPokemon.php
    //paser nombre por url ?name={}
    $url = "https://pokeapi.co/api/v2/pokemon?limit=50";

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $res = curl_exec($curl);

    $datos = json_decode($res, true);

    curl_close($curl);

    echo ("<br>holita<br>");
    // var_dump($datos["results"]);

    echo ("<ul>");

    $contador = 0;
    foreach ($datos["results"] as $dato) {
        $contador++;
        $nombre = $dato["name"];

        // $urlPokemon = "https://pokeapi.co/api/v2/pokemon/".$nombre;
        $urlPokemon = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/". $contador . ".png";

        $direccion = "infoPokemon.php?name=" . $nombre; 
        
        
        echo ("<li>" . ucfirst($nombre) .
        " <img src='".$urlPokemon."'>
        <a href='" .$direccion ."'>Mas info sobre ". ucfirst($nombre)."<a/>
        </li>
        <br>");
        // var_dump($datosPokemon);

    }

    echo ("</ul>")





    ?>

</body>

</html>