<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        function mostrarFormulario() {
            let metodoSeleccionado = document.querySelector("select[name=metodo]").value
            // console.log(metodoSeleccionado)
            let campoGet = document.getElementById("campoGet")
            let campoPostPut = document.getElementById("campoPostPut")
            let campoDelete = document.getElementById("campoDelete")

            document.getElementById("campoBoton").style.display = "block"

            campoGet.style.display="none"
            campoPostPut.style.display="none"
            campoDelete.style.display="none"

            if (metodoSeleccionado=="GET") {
                campoGet.style.display="block"
            } else if(metodoSeleccionado=="POST"||metodoSeleccionado=="PUT") {
                campoPostPut.style.display="block"
            } else if (metodoSeleccionado=="DELETE") {
                campoDelete.style.display="block"
            }

        }
    </script>
</head>

<body>

    <div class="container m-4">
        <h1>Tabla Videojuegos</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Seleccionar el metodo</label>
                <select name="metodo" class="form-select" onchange="mostrarFormulario()">
                    <option value="" selected disabled>Selecciona metodo</option>
                    <option value="GET">GET(Recuperar datos)</option>
                    <option value="POST">POST(Insertar datos)</option>
                    <option value="PUT">PUT(Cambiar datos)</option>
                    <option value="DELETE">DELETE(borrar datos)</option>
                </select>
            </div>
            <div id="datosPost" class="mb-3">
                <label class="form-label">Datos para todo:</label>
                <input type="text" name="nombre_desarrolladora" class="form-control" placeholder="Nombre desarrolladora">
                <input type="text" name="titulo" class="form-control" placeholder="titulo">
                <input type="number" name="anno_lanzamiento" class="form-control" placeholder="Ano lanzamiento">
                <input type="number" name="porcentaje_reseñas" class="form-control" placeholder="porcentaje reseñas">
                <input type="number" name="horas_duracion" class="form-control" placeholder="horas duracion">
                <input type="number" name="id_videojuego" class="form-control" placeholder="id videojuego">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $metodo = $_POST["metodo"];
        $datos = [];
        $url = "http://localhost/API/APIVideojuegos.php";
        $error = false;
        if ($metodo == "GET") {
            //mandamos un get, contruimos URL dependiendo de si da ciudad o no
            $titulo = isset($_POST["titulo"]) && !empty($_POST["titulo"]) ? "?titulo=" . urlencode($_POST["titulo"]) : "";
            $url .= $titulo;
        } elseif ($metodo == "POST") {
            //controlar TODO este set
            //se puede poner todo en la misma linea, podemos controlar que es exactamente lo que falla
            if (!isset($_POST["nombre_desarrolladora"]) || empty($_POST["nombre_desarrolladora"])) {
                $error = true;
            } else if (!isset($_POST["titulo"]) || empty($_POST["titulo"])) {
                $error = true;
            } else if (!isset($_POST["anno_lanzamiento"]) || empty($_POST["anno_lanzamiento"])) {
                $error = true;
            } else if (!isset($_POST["porcentaje_reseñas"]) || empty($_POST["porcentaje_reseñas"])) {
                $error = true;
            } else if (!isset($_POST["horas_duracion"]) || empty($_POST["horas_duracion"])) {
                $error = true;
            }

            if ($error==false) {
                $datos = [
                    "nombre_desarrolladora" => $_POST["nombre_desarrolladora"],
                    "titulo" => $_POST["titulo"],
                    "anno_lanzamiento" => $_POST["anno_lanzamiento"],
                    "porcentaje_reseñas" => $_POST["porcentaje_reseñas"],
                    "horas_duracion" => $_POST["horas_duracion"]
                ];
            } else{
                echo "por favor introduce todos los datos";
            }

        } else if ($metodo == "DELETE") {
            
            if (!isset($_POST["titulo"]) || empty($_POST["titulo"])) {
                $error = true;
            }
            if ($error==false) {
                $datos = ["titulo" => $_POST["titulo"]];
            } else {
                echo "por favor introduce videojuego a borrar";
            }
            
        } else if ($metodo == "PUT") {
            //pasarlo todo directamente?
            //solo have falta que id este set
            if (!isset($_POST["id_videojuego"]) || empty($_POST["id_videojuego"])) {
                $error = true;
            }

            if ($error==false) {
                $datos = [
                    "nombre_desarrolladora" => $_POST["nombre_desarrolladora"],
                    "titulo" => $_POST["titulo"],
                    "anno_lanzamiento" => $_POST["anno_lanzamiento"],
                    "porcentaje_reseñas" => $_POST["porcentaje_reseñas"],
                    "horas_duracion" => $_POST["horas_duracion"],
                    "id_videojuego" => $_POST["id_videojuego"]
                ];
            }
        }

        

        $opciones = [
            "http" => [
                "header" => "Content-Type: application/jason",
                "method" => $metodo,
                "content" => json_encode($datos)
            ]
        ];

        //contexto PHP
        $contexto = stream_context_create($opciones);

        if (!$error) {
            try {
                $respuesta = file_get_contents($url, false, $contexto);
                //construye una conexion HTTP usando el contexto de stream context
            } catch (Exception $e) {
                echo "Error al realizar la solicitud " . $e->getMessage();
            }
            echo "<pre>" . htmlspecialchars($respuesta) . "</pre>";
        }

        
    }
    ?>


</body>

</html>