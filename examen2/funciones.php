<?php

    #order: figura lado radio base altura

    function calcularArea($figura,$lado,$radio,$base,$altura){

        $area = "";

        if (!$figura=="") {
            $area = match ($figura) {
                "cuadrado" => !empty($lado) ? 'el area del cuadrado es ' .  $lado*$lado : "",
                "circulo" => !empty($radio) ? 'el area del circulo es ' . pi()*($radio*$radio) : "",
                "triangulo" => !empty($base)&&!empty($altura) ? 'el area del triangulo es ' . ($base*$altura)/2 : "",
            };
        }
        
        return $area;
    }


?>