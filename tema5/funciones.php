<?php
    //linked con dto
    function calcularDescuento(float $precio, float $descuento) : float{

        return $precio * ((100-$descuento)/100);
    }

    function calcularIVA(float $precio, float $iva) : float{

        return $precio*$iva;
    }

    function calcularIRPF(float $bruto) : float{

        $tramos = [
            ["limiteInferior" => 0, "limiteSuperior" => 12450, "porcentaje" => 0.19],
            ["limiteInferior" => 12450, "limiteSuperior" => 20200, "porcentaje" => 0.24],
            ["limiteInferior" => 20200, "limiteSuperior" => 35200, "porcentaje" => 0.30],
            ["limiteInferior" => 35200, "limiteSuperior" => 60000, "porcentaje" => 0.37],
            ["limiteInferior" => 60000, "limiteSuperior" => 300000, "porcentaje" => 0.45],
            ["limiteInferior" => 300000, "limiteSuperior" => INF, "porcentaje" => 0.47]
        ];

        $acumuladorImpuesto = 0;

        foreach ($tramos as $tramo) {
            if ($bruto>$tramo["limiteInferior"]) {
                $rangoImponible = min($bruto, $tramo["limiteSuperior"]) - $tramo["limiteInferior"];
                $acumuladorImpuesto += $rangoImponible;
            } else {
                break;
            }
        }
        echo "hola";
        return $bruto - $acumuladorImpuesto;
    }

    function sanear(string $var) : string{
        //quita codigo, espacios delante y detras y espacios excesivos entre medias
        $var = htmlspecialchars($var);
        $var = preg_replace("/\s+/"," ",trim($var));

        return $var;
    }

    function validar($var){

        if ($var=="") {
            return "no has introducido nada";
        }
        if ($var < 0) {
            return "tienes una edad nagativa";
        }
        if (!filter_var($var,FILTER_VALIDATE_INT)) {
            return "no has introducido un numero entero";
        }
        return $var;
    }

    

    define("GENERAL",1.21);
    define("REDUCIDO",1.10);
    define("SUPERREDUCIDO",1.04);

    function calcularDescuento(float $precio,int $descuento) : float {

        //return $precio -= ($precio * $descuento) /100;
        $descuento_decimal = $descuento /100;
        $descuento_aplicado = $precio * $descuento_decimal;
        $precio_final = $precio - $descuento_aplicado;

        return $precio_final;
    }
    function calcularIRPF(float $salario): float{

        $tramos = [
        ["limite_inferior" => 0,"limite_superior"=>12450, "porcentaje" => 0.19],
        ["limite_inferior" => 12450,"limite_superior"=>20200, "porcentaje" => 0.24],
        ["limite_inferior" => 20200,"limite_superior"=>35200, "porcentaje" => 0.30],
        ["limite_inferior" => 35200,"limite_superior"=>60000, "porcentaje" => 0.37],
        ["limite_inferior" => 60000,"limite_superior"=>300000, "porcentaje" => 0.45],
        ["limite_inferior" => 300000,"limite_superior"=>INF, "porcentaje" => 0.47]
        ];

        $acumulador_impuesto = 0;

        foreach($tramos as $tramo){
            if($salario > $tramo["limite_inferior"]){
                $rango_imponible = min($salario, $tramo["limite_superior"]) - $tramo["limite_inferior"];
                $acumulador_impuesto += $rango_imponible * $tramo["porcentaje"];
            }else{
                break;
            }
            
        }   
        return $salario - $acumulador_impuesto;
    }
    function calcularIVA(float $precio, string $iva): float{

        $var =  match($iva){
            "general" => $precio * GENERAL,
            "reducido" => $precio * REDUCIDO,
            "superreducido" => $precio * SUPERREDUCIDO
            };
        return $var;
    }
    function sanear($nombre): string{
        $nombre = htmlspecialchars($nombre);
        $nombre = preg_replace("/\s+/"," ",trim($nombre));

        return $nombre;
    }
    function validar($edad): bool | string | int {
        if($edad == ""){
            return false;
        }else if($edad < 0){
            return "Tienes una edad negativa";
        }else if(filter_var($edad,FILTER_VALIDATE_INT)==false){
            return "No has introducido un número entero";
        }else{
            return $edad;
        }
    }
?>
