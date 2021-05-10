<?php
    session_start();
    include ("../classes/Actividad.php");  

    if($_POST!=null){

   

                if($_POST['id_actividad']!=null ){


           
                  
                  $_actividad = new Actividad($_POST['id_actividad']);

                  echo "<pre>";
                  print_r($_actividad);
                  echo "</pre>";

           
                  $_actividad->id_estado          = filter_var($_POST['motivo'], FILTER_SANITIZE_NUMBER_INT);

                  echo "<pre>";
                  print_r($_actividad);
                  echo "</pre>";

              
                  $_actividad->update_actividad_table();


             

                  echo "<hr>TE ENVIO A .....PERFIL si todo bien NO TE MOSTRARE ESTE MSJ<hr>";
                   header("Location: ../actividades/actividades_bcn.php");
                  die();


                  }

                else{
                  echo "CAMPOS DEL POST ALGUNO VACIO<hr>";
                  header("Location: ../formularios/form_altas.php");
                  die();

                }


    }else{
      echo "NADA POR POST PARA ALTA USUARIO .";
      header("Location: ..");
      die();
    }



?>
