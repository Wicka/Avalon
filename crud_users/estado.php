<?php
   session_start(); 

    include ("../classes/Usuario.php");


        if(isset($_SESSION['alias_user'])){
        
            echo "hay sesion<hr>";
            $_user  = new Usuario($_SESSION['alias_user']);

            $_user->cambiar_estado_user(1);
            header("Location: ../index.php");
            die();
   
        }
        else{
            echo "NO sesion<hr>";
            header("Location: ../index.php");
            die();
        }

  
      


?>