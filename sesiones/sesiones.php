
<?php

    function Crear_Usuario_Sesion($_alias, $_tipo){

          if ($_alias == null){
              echo "ESTOY EN CREAR SESION SIN NICK<hr>";
              header ("Location: ../index.php");
              die();

          }else {

              //INICIO SESSIO
              echo "ESTOY EN CREAR SESION CON EL alias : ".$_alias."<hr>";
              session_start();
              $_SESSION['user']=$_alias;
              $_SESSION['tipo_user']=$_tipo;
              echo "Imprimo variable sesion user : ".$_SESSION['user']."<hr>";
              echo "Imprimo variable tipo user : ".$_SESSION['tipo_user']."<hr>";

          //    header ("Location: ../vistas/perfil_usuario.php");
          //    die();

            }
    }


    function Destruir_Sesion(){

      if (isset( $_SESSION['user'])){
          if(session_destroy() == true){
              session_destroy();
              header("Location: ../index.php");
              die();
          }
        }else{
          echo "No has iniciat sesio";
          header("Location: ../index.php");
          die();
        }
    }
 ?>
