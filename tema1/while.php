<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>While</h2>
    <?php
        $arr = [3,5,1,2,5,4,8,3];
        $buscar = 8;
        $i = 0;
        while ($i < count($arr)) {
            if ($arr[$i]==$buscar) {
                echo("se ha encontrado el numero $buscar en el array");
                break;
            };
            $i++;
        };
        
    ?>
</body>
</html>