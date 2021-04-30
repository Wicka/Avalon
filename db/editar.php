<?php
    session_start();
    include ("conexio_bbdd.php");
    include ("get_datas.php");
    include ("../seguridad/funciones_seguridad.php");
    include ("../sesiones/sesiones.php");

    echo "EDICCION <hr>";

    if($_POST!=null){

        echo "01<hr>";

                if($_POST['name']!=null and $_POST['surname_1']!=null and $_POST['birth']!=null and $_POST['email']!=null){


                  echo "02<hr>";

                  $conn=Connect_BBDD();

                  $_alias = filter_var(strtolower(trim($_SESSION['user'])), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
                  $_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                  $_surname_1 = filter_var($_POST['surname_1'], FILTER_SANITIZE_STRING);
                  $_surname_2 =  filter_var($_POST['surname_2'], FILTER_SANITIZE_STRING);
                  $_email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
                  $_birth =  filter_var(trim($_POST['birth']), FILTER_SANITIZE_NUMBER_INT);

                  echo "03<hr>";
            //      $_pwd_codificada = codifica_PWD($_pwd);

                  echo "nick :".$_nick;

                  //QUERY ALTA POR DEFECTO STATUS 1 ACTIVO
                  $_sql_Update="UPDATE `users`
                      SET
                      email='$_email',
                      name='$_name',
                      surname_01='$_surname_1',
                      surname_02='$_surname_2',
                      birth_date='$_birth'
                      WHERE  alias= '$_alias';";


                  //EJECUTO LA QUERY INSERTAR NUEVO USUARIO
                  $res_Insert_QUERY = $conn->query($_sql_Update);





                  if ($_FILES['userfile']['error']!=0){

                     echo "ERROR EN LA SUBIDA <hr>";
                     echo $_FILES['userfile']['error']."<hr>";

          //           header("Location: ../form_altas.php");
                 }else {

                     echo "FICHERO SUBIDO CON EXITO<hr>";
                     $conn=Connect_BBDD();
                     $user=get_user_by_nick($_nick, $conn );

                   //AQUI TENGO EL ID DEL REGISTRO Y AHORA QUIERO GUARDAR EL FICHERO CON ESTE NOMBRE

                     $_nom_foto_ID="../img/users/".$user['id'].".png";

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
                    header("Location: ../vistas/perfil_usuario.php");
                    die();



                  }


                else{
                  echo "CAMPOS DEL POST ALGUNO VACIO<hr>";
  //                header("Location: ../formularios/form_altas.php");
  //                die();

                }


    }else{
      echo "NADA POR POST PARA ALTA USUARIO .";
  //    header("Location: ..");
  //    die();
    }




    function verifica_nick($_nick,$conn ){

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
