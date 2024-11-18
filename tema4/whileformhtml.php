<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <h2>Ejercicio 1</h2>
  Pide al usuario que introduzca números enteros uno a uno y suma todos los
  números introducidos. El proceso termina cuando el usuario introduce un 0.
  Muestra la suma total al finalizar.<br />
  CONSEJITOS: 1 Es mas sencillo si hacéis la etiqueta php en el mismo
  documento del formulario. 2 Dejad este ejercicio para el final<br />
   IMPORTANTE: Debeis de controlar el caso de introducir un 0 en primera
  instancia
  <br />
  <form action="/tema4/whileformhtml.php" method="POST">
    <input type="hidden" name="form" value="ej1" />
    Numero: <input required type="number" min="0" name="numero" id="numero" />
    <input type="submit" value="Enviar" />
  </form>
  <?php
  
  if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $id = $_POST['form'];
    if ($id == 'ej1') {
      $numero = $_POST['numero'];
      if ($numero==0) {
        echo("suma total es $total");
        $total = 0;
      } else {
        $total += $numero;
      }
      echo("prueba $total");
    }
  }
  ?>

  <h2>Ejercicio 2</h2>
  Crea un array de 10 números aleatorios entre 1 y 100. Usando un bucle while,
  recorre el array para encontrar y mostrar el número máximo y el número
  mínimo.  
  <br>
  <?php
  $array = array();
  $i = 0;
  $num = 0;
  $min;
  $max;
  while ($i < 10) {
    $num = rand(1, 100);
    array_push($array, $num);
    $i++;
  }
  $i = 0;
  $min = max($array);
  $max = min($array);
  while ($i < 10) {
    if ($array[$i] < $min) {
      $min = $array[$i];
    }
    if ($array[$i] > $max) {
      $max = $array[$i];
    }
    $i++;
  }

  echo ("el numero menor en el array es $min y le mayor $max")


  ?>
  <h2>Ejercicio 3</h2>
  Crea un array con 5 números aleatorios entre 1 y 50. Usando un bucle while,
  invierte el orden de los elementos del array y muestra el array invertido. 
  
  <br>
  <?php
  $array = array();
  $i = 0;
  $num = 0;
  while ($i < 5) {
    $num = rand(1, 50);
    // array_push($array, $num);
    $array[$i] = $num;
    $i++;
  }
  print_r($array);
  echo ("<br>");
  $i = 4;
  $j = 0;
  $arrayInv = array();
  while (0 <= $i) {
    // array_push($arrayInv, $array[$i]);
    $arrayInv[$j] = $array[$i];
    $i--;
    $j++;
  }
  print_r($arrayInv);
  ?>
  <h2>Ejercicio 4</h2>
  Pide al usuario que introduzca una palabra. Usando un bucle while, recorre
  la palabra y cuenta cuántas vocales tiene. Muestra el número total de
  vocales al final. RECOMENDACIÓN: Usar "strtolower()" para pasar la palabra a
  minúsucula entera y "strlen()" para contar la longitud de un string 
  <form action="/tema4/whileformhtml.php" method="POST">
    <input type="hidden" name="form" value="ej4" />
    Palabra: <input required type="text" name="palabra" id="palabra" />
    <input type="submit" value="Enviar" />
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $value = $_POST['form'];

    if ($value == 'ej4') {
      $palabra = strtolower($_POST['palabra']);
      $i = 0;
      $j = 0;
      $strVocales = "aeiou";
      $contadorVocal = 0;
      $contadorConsonante = 0;
      // while ($i < strlen($palabra)) {
      //   match (true) {
      //     $palabra[$i] == 'a' => $contadorVocal++,
      //     $palabra[$i] == 'e' => $contadorVocal++,
      //     $palabra[$i] == 'i' => $contadorVocal++,
      //     $palabra[$i] == 'o' => $contadorVocal++,
      //     $palabra[$i] == 'u' => $contadorVocal++,
      //     default => $contadorConsonante++,
      //   };
      //   $i++;
      // }

      while ($i < strlen($palabra)) {
          while ($j < strlen($strVocales)) {
            $palabra[$i] == $strVocales[$j] ? $contadorVocal++ : $contadorConsonante++;
            $j++;
          }
        $j = 0;
        $i++;
      }

      echo ("vocales totales: $contadorVocal");
    }
  }


  ?>

  
  <h2>Ejercicio 5</h2>
  Pide al usuario que introduzca un número entero positivo. Usando un bucle
  while, calcula y muestra la suma de los dígitos de ese número. Por ejemplo,
  si el número es 123, la suma será 6 (1 + 2 + 3).  
  <br>
  <form action="/tema4/whileformhtml.php" method="POST">
    <input type="hidden" name="form" value="ej5.1" />
    Numero: <input required type="number" min="1" name="numero" id="numero" />
    <input type="submit" value="Enviar" />
  </form>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $value = $_POST['form'];

    if ($value == 'ej5') {

      $numero = $_POST['numero'];
      $total = 0;
      $i = 0;
      while ($i < strlen($numero)) {
        $total += $numero[$i];
        $i++;
      }

      echo ("suma total: $total");
    } else {
      $numero = $_POST['numero'];
      $total = 0;
      $i = 0;
      $original = $numero;

      while ($i < strlen($original)) {
        $total += $numero%10; //20 += 0
        // echo ("valor total $total <br>");
        // echo ("valor numero $numero <br>");
        $numero/=10;
        $i++;
      }
      echo ("suma total: $total segunda forma super sayin");
    }
  }
  ?>

  <h2>Ejercicio 6</h2>
  Crea un array vacío. Usando un bucle while, llena el array con los 10
  primeros números pares (empezando desde el 2). Muestra el array al final. 
  
  <br>
  <?php
  $array = array();
  $i = 2;
  function esPar($num){
    if($num%2==0){
      return true;
    }
    return false;
  }
  while ($i <= 20) {
    if (esPar($i)) {
      array_push($array, $i);
    }
    $i++;
  }
  print_r($array);
  ?>
  <h2>Ejercicio 7</h2>
  Pide al usuario que introduzca un número N (menor o igual a 20). Usando un
  bucle while, genera y muestra los primeros N números de la serie de
  Fibonacci. Si no sabéis qué es esta serie, buscad por internet o preguntar a
  Ale.  
  <br>
  <form action="/tema4/whileformhtml.php" method="POST">
    <input type="hidden" name="form" value="ej7" />
    Numero: <input required type="number" min="1" max="20" name="numero" id="numero" />
    <input type="submit" value="Enviar" />
  </form>
  <?php
  #fibonacci 1 1 2 3 5 8 13 21 34
  if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $value = $_POST['form'];

    if ($value == 'ej7') {

      $numero = $_POST['numero'];
      $nuevo = 1;
      $antiguo = 0;
      $holder = 0;
      $i = 0;
      while ($i < $numero) {
        echo ("$nuevo,");
        $holder = $nuevo;
        $nuevo += $antiguo;
        $antiguo = $holder;
        $i++;
      }
    }
  }
  ?>
  <h2>Ejercicio 8</h2>
  Pide al usuario que introduzca dos números enteros que representen un rango.
  Usando un bucle while, muestra todos los números dentro de ese rango que
  sean divisibles entre 5.  
  <br>
  <form action="/tema4/whileformhtml.php" method="POST">
    <input type="hidden" name="form" value="ej8" />
    Numero1: <input required type="number" name="numero1" id="numero1" />
    Numero2: <input required type="number" name="numero2" id="numero2" />
    <input type="submit" value="Enviar" />
  </form>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $value = $_POST['form'];

    if ($value == 'ej8') {
      $numero1 = $_POST['numero1'];
      $numero2 = $_POST['numero2'];
      $array = array();

      if ($numero1 > $numero2) {
        $i = $numero2;
        while ($i <= $numero1) {
          if ($i % 5 == 0) {
            array_push($array, $i);
            $i += 5;
          } else {
            $i++;
          }
        }
      } else {
        $i = $numero1;
        while ($i <= $numero2) {
          if ($i % 5 == 0) {
            array_push($array, $i);
            $i += 5;
          } else {
            $i++;
          }
        }
      }

      echo ("numero1: $numero1, numero2: $numero2 <br>");

      print_r($array);
    }
  }
  ?>
  <h2>Ejercicio 9</h2>
  Pide al usuario que introduzca dos números enteros que representen un rango.
  Usando un bucle while y la función esPrimo(), suma y muestra todos los
  números primos que se encuentren en ese rango.  
  <br>
  <form action="/tema4/whileformhtml.php" method="POST">
    <input type="hidden" name="form" value="ej9" />
    Numero1: <input required type="number" min="1" name="numero1" id="numero1" />
    Numero2: <input required type="number" min="1" name="numero2" id="numero2" />
    <input type="submit" value="Enviar" />
  </form>
  <?php
  function esPrimo($numero1, $numero2)
  {
    $array = array();
    $j = $numero2;
    $sumador = 0;
    $esPrimo = true;
    #mientras numeroP sea menor NumeroG
    while ($j <= $numero1) {
      $h = 2;
      #2aumenta y comprueba si numero es divisible
      while ($h < $j) {
        if ($j % $h == 0) {
          #no es primo
          $esPrimo = false;
          break;
        }
        $h++;
      }
      if ($esPrimo) {
        echo ("$j, ");
        $sumador += $j;
      } else {
        $esPrimo = true;
      }

      $j++;
    }
    echo ("<br>suma total: $sumador");
  }
  if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $value = $_POST['form'];

    if ($value == 'ej9') {
      $numero1 = $_POST['numero1'];
      $numero2 = $_POST['numero2'];
      $array = array();

      if ($numero1 > $numero2) {
        esPrimo($numero1, $numero2);
      } else {
        esPrimo($numero2, $numero1);
      }
    }
  }
  ?>
  <h2>Ejercicio 10</h2>
  Pide al usuario que introduzca una palabra. Usando un bucle while, verifica
  si la palabra es un palíndromo (se lee igual al derecho que al revés).
  Muestra un mensaje indicando si es o no un palíndromo.
  <br>
  <form action="/tema4/whileformhtml.php" method="POST">
    <input type="hidden" name="form" value="ej10" />
    Palabra: <input required type="text" min="1" name="palabra" id="palabra" />
    <input type="submit" value="Enviar" />
  </form>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $value = $_POST['form'];

    if ($value == 'ej10') {

      $palabra = $_POST['palabra'];
      $palabraInv = "";
      $i = strlen($palabra) - 1;
      $j = 0;
      while ($i >= 0) {
        $palabraInv[$i] = $palabra[$j];
        $i--;
        $j++;
      }

      if ($palabra == $palabraInv) {
        echo ("son palindromos");
      } else {
        echo ("no son palindromos");
      }
    }
  }
  ?>
</body>

</html>