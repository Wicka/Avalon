<?php
    include ("conexio_bbdd.php");
    include ("../seguridad/funciones_seguridad.php");
    include ("../sesiones/sesiones.php");

    if($_POST!=null){

        if($_POST['tipo_usuario']!=null and $_POST['alias']!=null and $_POST['pwd']!=null and $_POST['name']!=null and $_POST['surname_1']!=null and $_POST['birth']!=null and $_POST['email']!=null){

                  if (!empty($_POST['manana'])) {
                      echo "MARCADO";
                      $_manana='1';
                  } else {
                      echo "NO MARCADO";
                      $_manana='0';
                  }
                  echo "<hr>";

                  if (!empty($_POST['mediodia'])){
                      echo "MARCADO";
                      $_mediodia='1';
                  }else{
                      echo "NO MARCADO";
                      $_mediodia='0';
                  }
                  echo "<hr>";

                  if (!empty($_POST['tarde'])) {
                      echo "MARCADO";
                      $_tarde='1';
                  } else {
                      echo "NO MARCADO";
                      $_tarde='0';
                  }
                  echo "<hr>";

                  if (!empty($_POST['noche'])) {
                      echo "MARCADO";
                      $_noche='1';
                  } else {
                      echo "NO MARCADO";
                      $_noche='0';
                  }
                  echo "<hr>";

                  $_disponibilidad=$_manana.$_mediodia.$_tarde.$_noche;



          $conn=Connect_BBDD();
          $_tipo_usuario=$_POST['tipo_usuario'];
          $_alias = filter_var(strtolower(trim($_POST['alias'])), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
          $_pwd =  filter_var(trim($_POST['pwd']), FILTER_SANITIZE_STRING);
          $_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
          $_surname_1 = filter_var($_POST['surname_1'], FILTER_SANITIZE_STRING);
          $_surname_2 =  filter_var($_POST['surname_2'], FILTER_SANITIZE_STRING);
          $_email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
          $_birth =  filter_var(trim($_POST['birth']), FILTER_SANITIZE_NUMBER_INT);

          $_pwd_codificada = codifica_PWD($_pwd);


          echo "tipo usuario : ".$_tipo_usuario."<hr>";
          echo "alias : ".$_alias."<hr>";
          echo "pwd : ".$_pwd."<hr>";
          echo "name : ".$_name."<hr>";
          echo "surname_1 : ".$_surname_1."<hr>";
          echo "surname_2 : ".$_surname_2."<hr>";
          echo "email : ".$_email."<hr>";
          echo "birth : ".$_birth."<hr>";
          echo "pwd_codificada : ".$_pwd_codificada."<hr><hr><hr>";
          echo "Disponibilidad : ".$_disponibilidad."<hr>";

          $_tipo_documento = $_POST['documento'];
          echo "Tipo documento : ".$_POST['documento']."<hr>";

          $_num_documento = filter_var(trim($_POST['num_doc']), FILTER_SANITIZE_STRING);
          echo "Num. documento : ".$_POST['num_doc']."<hr>";

          
          
          $_sector = $_POST['sector_estudio'];
          $_nivel_estudio = $_POST['nivel_estudio'];

          echo "Nivel estudio : ". $_nivel_estudio ."<hr>";
          echo "Sector estudio : ". $_sector ."<hr>";
           
          
          //QUERY ALTA POR DEFECTO STATUS 1 ACTIVO





          $SQL_insert= "INSERT INTO `users`
          (`id_tipo`,
           `id_estado`,
           `id_disponibilidad`,
           `alias`,
           `email`,
           `pwd`,
           `create_date`,
           `last_connection`,
           `id_tipo_documento`,
           `num_documento`,
           `name`,
           `surname_01`,
           `surname_02`,
           `birth_date`,
           `id_titulacion`,
           `sector_estudios`)

            VALUES
            ('$_tipo_usuario',
              '1',
              '$_disponibilidad',
              '$_alias',
              '$_email',
              '$_pwd_codificada',
              current_timestamp(),
              current_timestamp(),
              '$_tipo_documento',
              '$_num_documento',
              '$_name',
              '$_surname_1',
              '$_surname_2',
              '$_birth',
              '$_nivel_estudio',
              '$_sector');";

          /*$SQL_insert="INSERT INTO users
          (`id_tipo`,`alias`, `email`, `name`, `surname_01`, `surname_02`,
          `birth_date`, `pwd`, `create_date`, `last_connection`, `id_estado`,`ambito`)
           VALUES ('$_tipo_usuario','$_alias', '$_email', '$_name', '$_surname_1', '$_surname_2', '$_birth',
          '$_pwd_codificada', current_timestamp(), current_timestamp(), '1', '0'); ";
*/
          //EJECUTO LA QUERY INSERTAR NUEVO USUARIO
          $res_Insert_QUERY = $conn->query($SQL_insert);



          echo "<pre>";
              print_r($res_Insert_QUERY);
          echo "</pre>";

          //GUARDAR IMAGEN
          //BUSCO EL ID DEL NUEVO REGISTRO PARA ASIGNARLO A LA IMAGEN QUE ME SUBA EL USUARIO

          $SQL_SELECT ="SELECT `id` ,`id_tipo`  FROM `users` ORDER BY `id` DESC LIMIT 1";
          $res_select_last_ID= $conn->query($SQL_SELECT);

          $user = $res_select_last_ID->fetch_assoc();

          Crear_Usuario_Sesion($_alias,  $_tipo_usuario);

          echo "<pre>";
              print_r($user);
          echo "</pre>";

          echo "EL ID ES : ".$user['id']."<hr>";




      if ($_FILES['userfile']['error']!=0){

             echo "ERROR EN LA SUBIDA <hr>";
             echo $_FILES['userfile']['error']."<hr>";

    //         header("Location: ..");
       }else {

           echo "FICHERO SUBIDO CON EXITO<hr>";
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

          $conn->close();

          echo "<hr>TE ENVIO A .....PERFIL si todo bien NO TE MOSTRARE ESTE MSJ<hr>";


       

      //    header("Location: ../vistas/perfil_usuario.php");
      //    die();
          }


          if ($_SESSION['tipo_user']==1){
              echo "TE ENVIO A ADMIN";
         //   header("Location: ../vistas/perfil_admin.php");
        //     die();

            }
            
          if ($_SESSION['tipo_user']==2){
            echo "TE ENVIO A VOLUNTARIO";
            header("Location: ../vistas/perfil_voluntario.php");
             die();
          }
          
          if ($_SESSION['tipo_user']==3){
            echo "TE ENVIO A USUARIO";
            header("Location: ../vistas/perfil_usuario.php");
             die();
          }


        }else{
          echo "CAMPOS DEL POST ALGUNO VACIO<hr>";
          header("Location: ../formularios/form_altas.php");
          die();

        }

    }else{
      echo "NADA POR POST PARA ALTA USUARIO .";
      header("Location: ..");
      die();
    }




    function verifica_alias($_alias,$conn ){

        echo "verifica alias<hr>";
        $Query = "SELECT `pwd` FROM `users` WHERE `alias` = '$_alias'" ;

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
