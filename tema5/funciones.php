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
?>