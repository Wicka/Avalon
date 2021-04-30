<?php

//**RECUPERO PWD DEL USUARIO NICK
//** SI NO EXISTE USUARIO ENVIO -1



 function get_all_estudios($conn){
   $_estudios=[];

   $Query = "SELECT * FROM `aux_nivel_estudios`" ;

   $estudios = $conn->query($Query);

   if($estudios->num_rows > 0){

       while($fila = $estudios->fetch_assoc()) {

          array_push($_estudios,$fila) ;
       }

   }else{
     echo "<br>No Existe este usuario";
     $_estudios=-1;
   }

   $conn->close();
   return $_estudios;
 }
 

 function get_all_sections($conn){

   $_sectores=[];

   $Query = "SELECT * FROM `aux_estudios`" ;

   $sectores = $conn->query($Query);

   if($sectores->num_rows > 0){

       while($fila = $sectores->fetch_assoc()) {

          array_push($_sectores,$fila) ;
       }

   }else{
     echo "<br>No Existe este usuario";
     $_sectores=-1;
   }

   $conn->close();
   return $_sectores;

 }







    function get_pwd_by_alias($_alias, $conn ){

        $tabla="users";

        $Query = "SELECT `id_tipo` , `pwd` FROM `users` WHERE `alias` = '$_alias'" ;

        $user = $conn->query($Query);

        if($user->num_rows > 0){
            $_user = $user->fetch_assoc();

        }else{
          echo "<br>No Existe este usuario";
          $_user=-1;
        }

        $conn->close();
        return $_user;
    }



  function get_user_by_alias($_alias, $conn ){


            $tabla="users";

            $Query = "SELECT * FROM `users` WHERE `alias` = '$_alias'" ;


            $user = $conn->query($Query);

            if($user->num_rows > 0){
                $_user = $user->fetch_assoc();
                $_Date = explode (" ", $_user['birth_date']);

                $_user['birth_date']=  $_Date[0];

            }else{
              echo "<br>No Existe este usuario desde get_data<hr>";
              $_user=-1;
            }
/*          echo "<pre>";
            print_r($_user);
            echo "</pre>";
*/

            $conn->close();
            return $_user;
        }

        function get_tipo_usuario_by_id($_id, $conn){


          //CONSULTA TOTS REGISTRES
          $sql = "SELECT `descripcion` FROM `aux_tipo_usuarios` WHERE `id`='$_id' ";

          //EXCUTO LA QUERY I GUARDO A VARIABLE
          $tipo_usuario = $conn->query($sql);

        //  $_genere=[];

          $_tipo = $tipo_usuario->fetch_assoc();

          //TANCO CONEXIO AMB LA BBDD
          $conn->close();

          return $_tipo;
    }


    function get_user_by_email(){

    }

    function get_user_by_status(){
    }
 ?>
