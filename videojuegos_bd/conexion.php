<?php
    // Configuración de la base de datos
    $_servidor = "localhost"; // Servidor de la base de datos
    $_usuario = "admin"; // Usuario que configuraste
    $_contrasena = "admin"; // Contraseña del usuario
    $_base_de_datos = "videojuegos_bd"; // Nombre de la base de datos

    // Crear conexión usando MySQLi
    $_conexion = new Mysqli($_servidor, $_usuario, $_contrasena, $_base_de_datos)
        or die("Error de conexión");
    //Crea una conexión entre PHP y la base de datos MySQL utilizando la clase "mysqli"
    // new mysqli(...) es el constructor de la clase mysqli, que se utiliza para inicializar un objeto que representa
    //      la conexión a la base de datos
    // Si se produce la conexión, la variable $_conexión contendrá un objeto de la clase mysqli, que podemos usar 
    //      con la BBDD (realizar consultas, manejar errores, etc.)
    // Si se produce un fallo al conecatarse, el método "connect_error" de este objeto contendrá info sobre el fallo

    // Usamos "->" para acceder a "connect_error" (por ejemplo) porque la flecha es el operador que usa PHP para acceder
    //      a métodos y propiedades de un objeto (en este caso es un objeto de la clase msqli)

    // Clase y objeto en PHP:
    //      - Una clase es una plantilla para crear objetos. Contiene métodos (que son las funciones que hemos visto) y
    //          propiedades (variables) que definen el comportamiento y los datos del objeto.
    //      - Un objeto es una instancia de una clase.

    // Las propiedades son variables definidas dentro de una clase. EJ: $_conexion->host_info;
    // Llamadas a métodos:
    //      Los métodos son funciones definidas dentro de una clase. EJ: $_conexion->query("SELECT * FROM videojuegos");
    // fetch_assoc(): Trabaja con los nombres de las columnas como claves para así poder ir iterando toda la tabla según 
    //      nos convenga. se utiliza para obtener una fila de un conjunto de resultados como un array asociativo. 
    //      Cada columna de la fila se almacena en el array asociativo utilizando el nombre de la columna como clave.
    // Verificar la conexión

    /**
     *     echo "Información sobre el host: ".$_conexion->host_info ."<br>";
    *echo "Versión de protocolo usado para la conexión: ". $_conexion->protocol_version."<br>";
    *echo "Información sobre el servidor: ". $_conexion->server_info . "<br>";
    *echo "Conexión exitosa a la base de datos <br>";
    *$tabla_videojuegos = $_conexion->query("SELECT * FROM videojuegos");
    *if($tabla_videojuegos->num_rows > 0){
    *    //Recorremos y mostramos los datos
    *    while($fila = $tabla_videojuegos->fetch_assoc()){
    *        echo "ID: ". $fila["id_videojuego"]." // Título: ". $fila["titulo"]. " // Año: ". $fila["anno_lanzamiento"]. "<br>";
    *    }
    * }else{
    *    echo "No se encontraron resultados";
    * }

     */


    //$_conexion->close();
?>