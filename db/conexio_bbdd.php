<?php
//*******************************************************************
//*******************************************************************
//FUNCION PER CONECTAR A LA BBDD
//*******************************************************************
//*******************************************************************

function Connect_BBDD(){

   
      $servidor = "localhost";
      $basededades = "avalon";
      $usuari = "avalon";
      $contrasenya = "avalon";
     /* 
      $servidor = "localhost";
      $basededades = "id16770810_avalon";
      $usuari = "id16770810_oberon";
      $contrasenya = "QhhSJiv+y82ELm1{";*/
      
      $conn = new mysqli($servidor, $usuari, $contrasenya, $basededades);

     
      if ($conn->connect_error) {
            //echo "Fallada en la connexió: ".$conn->connect_error;    
            header("Location:..");
            die();     
        }else{
             //echo "Conexio a BBDD ok <br><hr><br>";
      }
      return $conn;

}


function data_json(){

      //http://www.bcn.cat/tercerlloc/files/opendatabcn_agenda-cultural.json
}
 ?>
