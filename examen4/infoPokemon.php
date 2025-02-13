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
    //h1 con el nombre recojido en get ucfirst
    //altura, peso, id
    //ul con tipos ucfirst

    $nombre = $_GET["name"];
    $nombrePrimera = ucfirst($nombre);
    
    echo("<h1>$nombrePrimera</h1>");

    $url = "https://pokeapi.co/api/v2/pokemon/".$nombre;

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $res = curl_exec($curl);

    $datos = json_decode($res, true);

    curl_close($curl);

    echo("altura: ".$datos["height"]."<br>");
    echo("peso: ".$datos["weight"]."<br>");
    echo("ID: ".$datos["id"]."<br>");

    // var_dump($datos);

    echo("<ul>");

    // var_dump($datos["types"][0]["type"]["name"]);
    $contador = 0;
    foreach ($datos["types"] as $dato) {
        $contador++;
        $tipo = $dato["type"]["name"];
        echo("<li>Tipo $contador: ". ucfirst($tipo)."</li>");
    }
    echo("</ul>");

    


    ?>

</body>

</html>