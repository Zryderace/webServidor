<?php
    //linked con dto
    function calcularDescuento(float $precio, float $descuento) : float{

        return $precio * ((100-$descuento)/100);
    }

    function calcularIVA(float $precio, float $iva) : float{

        return $precio*$iva;
    }
?>