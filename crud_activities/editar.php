<?php
    session_start();
    include ("../classes/Actividad.php");  

    if($_POST!=null){

   

                if($_POST['name']!=null and $_POST['descripcion']!=null and $_POST['direccion']!=null and $_POST['fecha_inicio']!=null and $_POST['num_participantes']!=null){


           
                  
                  $_actividad = new Actividad($_POST['id_actividad']);

                  echo "<pre>";
                  print_r($_actividad);
                  echo "</pre>";

           
                  $_actividad->name               = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                  $_actividad->descripcion        = filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
                  $_actividad->direccion          = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
                  $_actividad->fecha_inicio       = filter_var(trim($_POST['fecha_inicio']), FILTER_SANITIZE_NUMBER_INT);
                  $_actividad->num_participantes  =  filter_var(trim($_POST['num_participantes']), FILTER_SANITIZE_NUMBER_INT);
   

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
