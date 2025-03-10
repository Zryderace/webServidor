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
        <h1>test</h1>
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
            <div id="campoGet" class="mb-3" style="display: none;">
                <label class="form-label">Datos para GET:</label>
                <input type="text" name="nombre_desarrolladora" class="form-control" placeholder="Nombre desarrolladora">
            </div>
            <div id="campoPostPut" class="mb-3" style="display: none;">
                <label class="form-label">Datos para POST o PUT:</label>
                <input type="text" name="nombre_desarrolladora" class="form-control" placeholder="Nombre desarrolladora">
                <input type="text" name="ciudad" class="form-control" placeholder="Ciudad">
                <input type="number" name="anno_fundacion" class="form-control" placeholder="Ano fundacion">
            </div>
            <div id="campoDelete" class="mb-3" style="display: none;">
                <label class="form-label">Datos para DELETE:</label>
                <input type="text" name="nombre_desarrolladora" class="form-control" placeholder="Nombre desarrolladora">
            </div>
            <button id="campoBoton" type="submit" class="btn btn-primary" style="display: none;">Enviar</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $metodo = $_POST["metodo"];
        $datos = [];
        $url = "http://localhost/API/nucleoAPI.php";
        if ($metodo == "GET") {
            //mandamos un get, contruimos URL dependiendo de si da ciudad o no
            $ciudad = isset($_POST["ciudad"]) && !empty($_POST["ciudad"]) ? "?ciudad=" . urlencode($_POST["ciudad"]) : "";
            $url .= $ciudad;
            // echo "url generada: " . htmlspecialchars($url) . "<br>";
            // try {
            //     $res = file_get_contents($url);
            //     echo "<pre>" . htmlspecialchars($res) . "</pre>";
            // } catch (Exception $e) {
            //     echo "Error al realizar la solicitud " . $e->getMessage();
            // }
        }
        // else if ($metodo == "POST"||$metodo=="PUT"||$metodo=="DELETE") {
        //     $datos = [
        //         "nombre_desarrolladora" => $_POST["nombre_desarrolladora"],
        //         "ciudad" => $_POST["ciudad"],
        //         "anno_fundacion" => $_POST["anno_fundacion"]
        //     ];
        // } 
        // else if ($metodo == "PUT") {
        //     $datos = [
        //         "nombre_desarrolladora" => $_POST["nombre_desarrolladora"],
        //         "ciudad" => $_POST["ciudad"],
        //         "anno_fundacion" => $_POST["anno_fundacion"]
        //     ];
        // } elseif ($metodo == "DELETE") {
        //     $datos = [
        //         "nombre_desarrolladora" => $_POST["nombre_desarrolladora"],
        //         "ciudad" => $_POST["ciudad"],
        //         "anno_fundacion" => $_POST["anno_fundacion"]
        //     ];
        // }

        $datos = [
            "nombre_desarrolladora" => $_POST["nombre_desarrolladora"],
            "ciudad" => $_POST["ciudad"],
            "anno_fundacion" => $_POST["anno_fundacion"]
        ];

        $opciones = [
            "http" => [
                "header" => "Content-Type: application/jason",
                "method" => $metodo,
                "content" => json_encode($datos)
            ]
        ];

        //contexto PHP
        $contexto = stream_context_create($opciones);

        try {
            $respuesta = file_get_contents($url, false, $contexto);
            //construye una conexion HTTP usando el contexto de stream context
        } catch (Exception $e) {
            echo "Error al realizar la solicitud " . $e->getMessage();
        }

        echo "<pre>" . htmlspecialchars($respuesta) . "</pre>";
    }
    ?>


</body>

</html>