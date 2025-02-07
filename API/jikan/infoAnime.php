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
    <?php
        $id= $_GET["id"];

        $apiURL = "https://api.jikan.moe/v4/anime/$id/full";

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $apiURL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($curl);

        curl_close($curl);

        $datos = json_decode($res,true);
        $datos = $datos["data"];

        echo "<h1>{$datos['title']}</h1>";
        echo "<h1>{$datos['title_japanese']}</h1>";
        echo "<h1>{$datos['rank']}</h1>";
        echo "<img src='{$datos['images']['jpg']['image_url']}'>";

        echo "<br>";
        $relacionados = $datos["relations"];

        foreach ($relacionados as $relacionado) {
            $entradas = $relacionado["entry"];
            foreach ($entradas as $entrada) {
                if ($entrada["type"]=="anime") {
                    echo "animes relacionados: " . $entrada["name"] . "<br>";
                }
                // echo $entrada["name"];
                // echo $entrada["type"] . "<br>";
            }
            
            // echo "
            //       <p>Nombre: {$relacionado['name']} id: {$relacionado['mal_id']} url: {$relacionado['url']} type: {$relacionado['type']}</p>
            //     ";
        }

        $estudios = $datos["studios"];

        foreach ($estudios as $estudio) {
            echo "
                  <p>Nombre: {$estudio['name']} URL: {$estudio['url']}</p>
                ";
        }

        $generos = $datos["genres"];

        foreach ($generos as $genero) {
            echo "
                  <p>Nombre genero: {$genero['name']}</p>
                ";
        }

        echo "<h1>Synopsis:</h1><p>{$datos['synopsis']}</p>";

        echo "<iframe src='{$datos['trailer']['embed_url']}'></iframe>";

    ?>

    
</body>
</html>