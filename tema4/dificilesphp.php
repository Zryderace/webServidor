<?php

    // if ($_SERVER["REQUEST_METHOD"]=='GET') {
        
    // }
    if ($_SERVER["REQUEST_METHOD"]=='POST') {

        $id = $_POST['form'];
        $correcto = true;
        

        if ($id=='ej1') {
            $array = [1, 9, 7, 5];
            if (strlen($secreto)==0) {
                $i = 0;
                echo("se pone a 0");
            }
            
            // $secreto = isset($secreto) ? $_POST['numero'] : '';
            $secreto = $_POST['numero'];
            echo("valor secreto introducido $secreto");

            if ($array[$i]==$secreto) {
                echo("aumenta i");
                $i++;
            } else{
                $correcto = false;
                echo("correcto es false");
            }

            if ($i==count($array)-1&&$correcto) {
                echo("has acertado la clave");
            } else if ($i==count($array)-1&&!$correcto){
                echo("no has acertado la clave");
                $secreto = '';
                $correto = true;
            }
            
        }
        
    }
    
    



?>