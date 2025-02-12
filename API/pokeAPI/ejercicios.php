<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",true);
    ?>
</head>
<body>
    <h1>Ejercicio 1</h1>
    <!-- lista 10 poke, primera letra mayuscula ucfirst() -->
     <!-- enlace redirija a otra pagina con mas detalles del pokemito -->
    <?php
        $apiURL = "https://pokeapi.co/api/v2/";
        $direccion = "pokemon/";
        $limite = "?limit=";
        $limite .= "10";

        $apiURL .= $direccion . $limite;
        
        // echo($apiURL);

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $apiURL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($curl);

        curl_close($curl);

        $datos = json_decode($res,true);
        
        $pokemones = $datos["results"];

        foreach($pokemones as $pokemon){
            $nombre = ucfirst($pokemon["name"]);
            echo "<p>Nombre del pokemon: $nombre <br> <a href='detalle_pokemon.php?name={$pokemon["name"]}'>Ver mas detalles</a></p>";
        }



    ?>
    <h1>Ejercicio 2</h1>

    detalle pokemon
</body>
</html>