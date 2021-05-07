<?php
    session_start();
    include ("../classes/Usuario.php");
  

    if($_POST!=null){

   

                if($_POST['name']!=null and $_POST['surname_1']!=null and $_POST['birth']!=null and $_POST['email']!=null){


           
                  
                  $_user = new Usuario($_POST['alias_oculto']);

                  echo "<pre>";
                  print_r($_user);
                  echo "</pre>";

           
                  $_user->name        = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                  $_user->surname_01  = filter_var($_POST['surname_1'], FILTER_SANITIZE_STRING);
                  $_user->surname_02  =  filter_var($_POST['surname_2'], FILTER_SANITIZE_STRING);
                  $_user->email       = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
                  $_user->birth       =  filter_var(trim($_POST['birth']), FILTER_SANITIZE_NUMBER_INT);
   

                  echo "alias :".$_user->alias."<hr>";

                  $_user->update_user_table();



                  if ($_FILES['userfile']['error']!=0){

                     echo "ERROR EN LA SUBIDA ";
                     echo $_FILES['userfile']['error']."<hr>";

          //           header("Location: ../form_altas.php");
                 }else {

                     echo "FICHERO SUBIDO CON EXITO<hr>";
          
                   //AQUI TENGO EL ID DEL REGISTRO Y AHORA QUIERO GUARDAR EL FICHERO CON ESTE NOMBRE

                     $_nom_foto_ID="../img/users/".$_user->id.".png";

                     if(is_uploaded_file($_FILES['userfile']['tmp_name'])){

                         if($_FILES['userfile']['size'] > 5120000){
                               echo "TAMAÑO INCORRECTO <hr>";
                         }elseif(!(strpos($_FILES['userfile']['type'],"jpeg")) && !(strpos($_FILES['userfile']['type'],"jpg"))  && !(strpos($_FILES['userfile']['type'],"png")) ){
                               echo "TIPO DE ARCHIVO INCORRECTO <hr>";
                               }else{
                                     move_uploaded_file($_FILES['userfile']['tmp_name'],$_nom_foto_ID);
                                     echo "MOVIDO CON EXITO A CARPETA <hr>";
                               }
                     }else{
                         echo "no subes nada <hr>";
                     }
                  }


                  echo "<hr>TE ENVIO A .....PERFIL si todo bien NO TE MOSTRARE ESTE MSJ<hr>";
                   header("Location: ..");
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




    function _verifica_nick($_nick,$conn ){

        $Query = "SELECT `pwd` FROM `users` WHERE `nick` = '$_nick'" ;

        $user = $conn->query($Query);

        if($user->num_rows > 0){
            $_user = true;
        }else{
          echo "<br>No Existe este usuario";
          $_user= false;
        }

        return $_user;
    }

?>
