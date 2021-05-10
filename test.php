<?php
//dades de connexió
$servidor = "localhost";
$basededades = "id16770810_avalon";
$usuari = "id16770810_oberon";
$contrasenya = "QhhSJiv+y82ELm1{";

//fem la connexió
$conn = new mysqli($servidor, $usuari, $contrasenya, $basededades);

// comprovem la connexió
if ($conn->connect_error) {
  echo "Fallada en la connexió: ".$conn->connect_error;
  die();
}else{
  echo "ok<br>";
}

$conn->close(); //tanquem la connexió amb la base de dades
?>