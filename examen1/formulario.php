<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        
    </style>
</head>
<body>
    <h1>Ejercicio1</h1>
    <form action="ejercicio.php" method="POST">
        <input type="hidden" name="form" value="ej1" />
        <input type="submit" value="Enviar" />
    </form>
    <h1>Ejercicio2</h1>
    <form action="ejercicio.php" method="POST">
        <input type="hidden" name="form" value="ej2" />
        Inferior: <input required type="number" min="1" name="inferior"/>
        Superior: <input required type="number" min="1" name="superior"/>
        <input type="submit" value="Enviar" />
    </form>
    <h1>Ejercicio3</h1>
    <form action="ejercicio.php" method="GET">
        <input type="hidden" name="form" value="ej1" />
        <input type="text" name="action">
        <input type="submit" value="Enviar" />
    </form>
    <h1>EjercicioExtra</h1>
    <form action="ejercicio.php" method="GET">
        <input type="hidden" name="form" value="ej2" />
        <input type="text" name="action">
        <input type="submit" value="Enviar" />
    </form>  
    <h1>Pascal</h1>
    <form action="ejercicio.php" method="POST">
        <input type="hidden" name="form" value="ej3" />
        filas: <input required type="number" min="1" name="filas"/>
        <input type="submit" value="Enviar" />
    </form> 
    <h1>floyd</h1>
    <form action="ejercicio.php" method="POST">
        <input type="hidden" name="form" value="ej4" />
        filas: <input required type="number" min="1" name="numero"/>
        <input type="submit" value="Enviar" />
    </form> 
</body>
</html>