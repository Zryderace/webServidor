<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

//se usa para enviar una cabecera HTTP a palo seco
//normalmente se redirige con location pero tambien se usa para indicar el tipo de dato contenido
header("Content-Type: application/json");
require "conexion_pdo.php";

$metodo = $_SERVER["REQUEST_METHOD"];
//lee el cuerpo de la solicitud
$entrada = file_get_contents("php://input");
var_dump($entrada);
//de json a array clave
$entrada = json_decode($entrada, true);

switch ($metodo) {
    case 'GET':
        controlGet($_conexion, $entrada);
        break;
    case 'POST':
        controlPost($_conexion, $entrada);
        break;
        // case 'PUT':
        //     controlPut($_conexion, $entrada);
        //     break;
    case 'DELETE':
        controlDelete($_conexion, $entrada);
        break;
    case 'PUT':
        controlPut($_conexion, $entrada);
        break;

    default:
        echo json_encode(["metodo" => "otro"]);
        break;
}

function controlGet($_conexion, $entrada)
{
    //sin juego, toda las primary keys
    //con juego, solo la linea que pertenezca
    if (isset($_GET["titulo"]) && $_GET["titulo"] != "") {
        $consulta = "SELECT * FROM videojuegos WHERE titulo = :t";
        $stmt = $_conexion->prepare($consulta);
        $stmt->execute([
            "t" => $_GET["titulo"]
        ]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $consulta = "SELECT * FROM videojuegos";
        $stmt = $_conexion->prepare($consulta);
        $stmt->execute();
        $ids = [];
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($res as $fila) {
            array_push($ids, $fila["id_videojuego"]);
        }
        $res = $ids;
    }

    echo json_encode($res);
}
function controlPost($_conexion, $entrada)
{
    //controlar TODO fuera?
    //todido fuera man, aqui biene bien, clean, limpio, 5 lineas ganando
    //pero comprobar que la desarrolladora exista lmao
    $consulta = "SELECT * FROM desarrolladoras WHERE nombre_desarrolladora = :nd";
    $stmt = $_conexion->prepare($consulta);

    $stmt->execute([
        "nd" => $entrada["nombre_desarrolladora"]
    ]);

    $fila = $stmt->fetch();

    if ($fila) {
        echo json_encode(["message" => "la desarrolladora existe"]);
        try {
            $consulta = "INSERT INTO videojuegos (titulo, nombre_desarrolladora, anno_lanzamiento, porcentaje_reseñas, horas_duracion) VALUES (:t, :nd, :al, :pr, :hd)";
            $stmt = $_conexion->prepare($consulta);
            $stmt->execute([
                "t" => $entrada["titulo"],
                "nd" => $entrada["nombre_desarrolladora"],
                "al" => $entrada["anno_lanzamiento"],
                "pr" => $entrada["porcentaje_reseñas"],
                "hd" => $entrada["horas_duracion"]
            ]);
            echo json_encode(["todo" => "bien"]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo json_encode(["error" => "no se pudo meter"]);
        }
    } else {
        echo json_encode(["error" => "la desarrolladora NO existe"]);
    }
}
function controlPut($_conexion, $entrada)
{

    //obligatorio la primary para llegar al videojuego
    //update lo que exista

    // SET 
    //     name = CASE WHEN :new_name IS NOT NULL THEN :new_name ELSE name END,
    //     email = CASE WHEN :new_email IS NOT NULL THEN :new_email ELSE email END,
    //     phone = CASE WHEN :new_phone IS NOT NULL THEN :new_phone ELSE phone END,
    //     address = CASE WHEN :new_address IS NOT NULL THEN :new_address ELSE address END,
    //     age = CASE WHEN :new_age IS NOT NULL THEN :new_age ELSE age END
    // WHERE id = :user_id;

    // $datos = [
    //     "nombre_desarrolladora" => $_POST["nombre_desarrolladora"],
    //     "titulo" => $_POST["titulo"],
    //     "anno_lanzamiento" => $_POST["anno_lanzamiento"],
    //     "porcentaje_reseñas" => $_POST["porcentaje_reseñas"],
    //     "horas_duracion" => $_POST["horas_duracion"],
    //     "id_videojuego" => $_POST["id_videojuego"]
    // ];

    $id_videojuego = isset($entrada["id_videojuego"]) && !empty($entrada["id_videojuego"]) ? $entrada["id_videojuego"] : "";
    $nombre_desarrolladora = isset($entrada["nombre_desarrolladora"]) && !empty($entrada["nombre_desarrolladora"]) ? $entrada["nombre_desarrolladora"] : "";

    try {

        $consulta = $_conexion->prepare("SELECT * FROM videojuegos WHERE id_videojuego = :id");

        $consulta->execute(["id" => $id_videojuego]);

        $id = $consulta->fetch();
        //
        $consulta = "SELECT * FROM desarrolladoras WHERE nombre_desarrolladora = :nd";
        $stmt = $_conexion->prepare($consulta);

        $stmt->execute([
            "nd" => $nombre_desarrolladora
        ]);

        $desarrolladora = $stmt->fetch();



        //comprobado videojuego existe y desarrolladora dada
        if ($id&&$desarrolladora) {
            //aqui existe
            $definitivo=[];
            if($entrada["horas_duracion"] ==""){
                $definitivo["horas_duracion"] = $id["horas_duracion"];
            }else{
                $definitivo["horas_duracion"] = $entrada["horas_duracion"];
            }
            try {
                $consulta = "UPDATE videojuegos SET 
                    nombre_desarrolladora = CASE WHEN :nombre_desarrolladora != '' THEN :nombre_desarrolladora ELSE nombre_desarrolladora END,
                    titulo = CASE WHEN :titulo != '' THEN :titulo ELSE titulo END,
                    anno_lanzamiento = CASE WHEN :anno_lanzamiento != '' THEN :anno_lanzamiento ELSE anno_lanzamiento END,
                    porcentaje_reseñas = CASE WHEN :porcentaje_reseñas != '' THEN :porcentaje_reseñas ELSE porcentaje_reseñas END,
                    horas_duracion = CASE WHEN :horas_duracion != '' THEN :horas_duracion ELSE horas_duracion END
                WHERE id_videojuego = :id;";
                $stmt = $_conexion->prepare($consulta);
                //si lo hace true si no false
                $stmt->execute([
                    "nombre_desarrolladora" => $entrada["nombre_desarrolladora"],
                    "titulo" => $entrada["titulo"],
                    "anno_lanzamiento" => $entrada["anno_lanzamiento"],
                    "porcentaje_reseñas" => $entrada["porcentaje_reseñas"],
                    "horas_duracion" => $entrada["horas_duracion"],
                    "id" => $entrada["id_videojuego"]
                ]);
                echo json_encode(["todo" => "bien updateado"]);
            } catch (PDOException $e) {
                echo $e->getMessage();
                echo json_encode(["error" => "no se pudo update"]);
            }
        } else {
            echo json_encode(["error" => "no existe videojuego con ese id o desarrolladora con ese nombre"]);
        }
    } catch (PDOException $e) {
        echo "ERROR: no se puede recuperar la consulta " . $e->getMessage();
    }
}
function controlDelete($_conexion, $entrada)
{
    //controlar TODO fuera?
    //todido fuera man, aqui biene bien, clean, limpio, 5 lineas ganando
    //pero comprobar que la videojuego exista lmao
    $titulo = isset($entrada["titulo"]) && !empty($entrada["titulo"]) ? $entrada["titulo"] : "";

    if ($titulo === "ADMIN") {
        try {
            $consulta = $_conexion->prepare("DELETE FROM videojuegos");

            $consulta->execute();
            echo json_encode(["message" => "lo borraste todo mi niño"]);
        } catch (PDOException $e) {
            echo json_encode(["error" => "no se pudo borrar como ADMIN"]);
        }
    } else if ($titulo != "") {
        try {
            //exista videojuego con eso
            $consulta = $_conexion->prepare("SELECT * FROM videojuegos WHERE titulo = :t");

            $consulta->execute(["t" => $titulo]);

            $fila = $consulta->fetch();

            if ($fila) {
                try {
                    $consulta = "DELETE FROM videojuegos WHERE titulo = :t";
                    $stmt = $_conexion->prepare($consulta);
                    $stmt->execute([
                        "t" => $entrada["titulo"],
                    ]);
                    echo json_encode(["todo" => "videojuego bien borrado"]);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    echo json_encode(["error" => "no se pudo borrar"]);
                }
            } else {
                echo json_encode(["error" => "no existe videojuego con ese nombre"]);
            }
        } catch (PDOException $e) {
            echo "ERROR: no se puede recuperar la consulta " . $e->getMessage();
        }
    }
}
