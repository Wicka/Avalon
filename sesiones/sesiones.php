<?php
   session_start();
    function Crear_Usuario_Sesion($_user){
          if ($_user->alias == null){
         //     echo "ESTOY EN CREAR SESION SIN alias<hr>";
              header ("Location: ../index.php");
              die();
          }else {
              //INICIO SESSIO
        //      echo "ESTOY EN CREAR SESION CON EL alias : ".$_user->alias ."<hr>";
              $_SESSION['obj_user']=$_user;
              $_SESSION['alias_user']=$_user->alias ;
              $_SESSION['tipo_user']=$_user->id_tipo;
              $_SESSION['id_user']=$_user->id;              
          //    echo "Imprimo variable sesion user : ".$_SESSION['alias_user']."<hr>";
          //    echo "Imprimo variable tipo user : ".$_SESSION['tipo_user']."<hr>";     

            }
    }

 ?>
