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
    $apiURL = "https://api.jikan.moe/v4/top/anime";

    //esto inicia
    $curl = curl_init();
    //url a consuultar
    curl_setopt($curl, CURLOPT_URL, $apiURL);
    //devolver resultado en lugar de imprimirlo
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //ejecutar session
    $res = curl_exec($curl);
    //esto cierra
    curl_close($curl);

    // var_dump($res);

    //true es necesario para hacer json
    $res = json_decode($res, true);

    // var_dump($res);

    $animes = $res["data"];


    //  while($fila = $tabla_videojuegos->fetch_assoc()){
    //      echo "ID: ". $fila["id_videojuego"]." // Título: ". $fila["titulo"]. " // Año: ". $fila["anno_lanzamiento"]. "<br>";
    //  }


    ?>

    <table>
        <thead>
            <tr>
                <th>Posicion</th>
                <th>titulo</th>
                <th>Nota</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // foreach ($animes as $anime) {
            //     echo "<tr> 
            //                     <td> {$anime['rank']} </td>
            //                     <td><a href='infoAnime.php?id={$anime['mal_id']}'> {$anime['title']} </a></td>
            //                     <td> {$anime['score']} </td>
            //                     <td> <img src='{$anime['images']['jpg']['image_url']}'></td>
            //         </tr>";
            // }
            ?>
            <?php
            foreach ($animes as $anime) {
                $mal_id = $anime['mal_id'];
                echo "<tr> 
                      <td>{$anime['rank']}</td>
                      <td><a href='infoAnime.php?id={$mal_id}'>{$anime['title']}</a></td>
                      <td>{$anime['score']}</td>
                      <td><img src='{$anime['images']['jpg']['image_url']}' alt='{$anime['title']}'></td>
                  </tr>";
            }
            ?>

        </tbody>
    </table>

</body>

</html>