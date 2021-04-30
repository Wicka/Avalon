<?php
    session_start();

    if (isset( $_SESSION['user'])){

        if(session_destroy() == true){
          echo "No has iniciat sesio";
          header("Location: ../index.php");
          die();
        }

      }else{
        session_destroy();
        echo "Sesion cerrada<hr>";
        header("Location: ../index.php");
        die();
      }
 ?>
